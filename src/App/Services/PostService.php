<?php

declare(strict_types=1);

namespace App\Services;

use Framework\Database;

class PostService
{

    public function __construct(private Database $db)
    {
    }

    public function create(array $postData)
    {

        $this->db->query("INSERT INTO posts (title,content,user_id) VALUES (:title,:content,:user_id)", [
            'title' => $postData['title'],
            'content' => $postData['content'],
            'user_id' => $_SESSION['user']
        ]);
    }

    public function update(array $postData)
    {
        $this->db->query("UPDATE posts SET title=:title ,content=:content WHERE id=:id", [
            'title' => $postData['title'],
            'content' => $postData['content'],
            'id' => $postData['id']
        ]);
    }

    public function deletePost($id)
    {
        $this->deleteComments($id);
        $this->db->query("DELETE FROM posts WHERE id=:id", ['id' => $id]);
    }

    public function getAll(): array
    {
        return $this->db->query("SELECT id,title,content FROM posts WHERE is_enabled=true;")->findAll();
    }

    public function getById($id): array
    {
        $post = $this->db->query("SELECT id,title,content,user_id FROM posts WHERE is_enabled=true AND id = :id;", ['id' => $id])->find();
        $comments = $this->db->query("SELECT id,name,email,text FROM comments WHERE is_enabled=true AND post_id = :id;", ['id' => $id])->findAll();
        $username = $this->db->query("SELECT username FROM users WHERE id=:id", ['id' => $post['user_id']])->find();
        $post['comments'] = $comments;
        $post['author'] = $username['username'];
        return $post;
    }

    public function exist($id): int
    {
        return $this->db->query("SELECT COUNT(*) FROM posts WHERE is_enabled=true AND id = :id;", ['id' => $id])->count();
    }

    public function addComment(array $commentData)
    {
        $this->db->query("INSERT INTO comments (post_id,name,email,text) VALUES (:post_id,:name,:email,:text)", [
            'post_id' => $commentData['post_id'],
            'name' => $commentData['name'],
            'email' => $commentData['email'],
            'text' => $commentData['text'],
        ]);
    }

    public function deleteComments($id)
    {
        $this->db->query("DELETE FROM comments WHERE post_id=:post_id", ['post_id' => $id]);
    }

    public function deleteCommentsById($id)
    {
        $this->db->query("DELETE FROM comments WHERE id=:id", ['id' => $id]);
    }
}
