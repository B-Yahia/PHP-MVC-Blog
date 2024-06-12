<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Services\{ValidatorService, PostService};
use Framework\TemplateEngine;

class PostController
{

    public function __construct(
        private TemplateEngine $templateEngine,
        private ValidatorService $validatorService,
        private PostService $postService
    ) {
    }

    public function addPostView()
    {
        if (empty($_GET['id'])) {
            echo $this->templateEngine->render("add_post.php", []);
        } else {
            if ($this->postService->exist($_GET['id'])) {
                $post = $this->postService->getById($_GET['id']);
                echo $this->templateEngine->render("add_post.php", ['post' => $post]);
            } else {
                redirectTo('/');
            }
        }
    }

    public function addPost()
    {
        if (empty($_GET['id'])) {
            $this->validatorService->validatePost($_POST);
            $this->postService->create($_POST);
            redirectTo('/');
        } else {
            if ($this->postService->exist($_GET['id'])) {
                $this->validatorService->validatePost($_POST);
                $this->postService->update([...$_POST, 'id' => $_GET['id']]);
                redirectTo('/');
            } else {
                redirectTo('/');
            }
        }
    }

    public function postView()
    {
        if (empty($_GET['id'])) {
            redirectTo('/');
        } else {
            if ($this->postService->exist($_GET['id'])) {
                $post = $this->postService->getById($_GET['id']);
                echo $this->templateEngine->render("post.php", ['post' => $post]);
            } else {
                redirectTo('/');
            }
        }
    }

    public function addComment()
    {
        $this->postService->addComment([
            "post_id" => $_GET['id'],
            'name' => $_POST['comment_name'],
            'email' => $_POST['comment_email'],
            'text' => $_POST['comment_text'],
        ]);
        redirectTo('/post?id=' . $_GET['id']);
    }

    public function deleteComment()
    {
        $this->postService->deleteCommentsById($_POST['id']);
        redirectTo('/post?id=' . $_GET['id']);
    }
}
