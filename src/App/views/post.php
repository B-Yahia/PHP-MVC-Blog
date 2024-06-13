<!DOCTYPE html>
<html>

<head>
    <?php require __DIR__ . "/../partials/head.php"; ?>
    <link rel="stylesheet" type="text/css" href="../../../public/assets/post.css" />
</head>

<body>
    <?php require __DIR__ . "/../partials/top_menu.php"; ?>

    <div class="post_card">
        <h3 class="post_title"><?php echo $post['title'] . " -- " . $post['author']; ?></h3>
        <p class="post_body"><?php echo $post['content'] ?></p>
    </div>

    <form method="post" class="comment_form">
        <input type="hidden" name="token" value="<?php echo $csrfToken ?>" />
        <h3>Add a Comment</h3>
        <div class="form-group">
            <label for="comment_name">Name</label>
            <input type="text" name="comment_name" id="comment_name" />
            <?php if (array_key_exists('comment_name', $errors)) : ?>
                <?php foreach ($errors['comment_name'] as $msg) ?>
                <div class="msg_error">
                    Error :<?php echo $msg; ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label for="comment_email">Email</label>
            <input type="email" name="comment_email" id="comment_email" />
            <?php if (array_key_exists('comment_email', $errors)) : ?>
                <?php foreach ($errors['comment_email'] as $msg) ?>
                <div class="msg_error">
                    Error :<?php echo $msg; ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label for="comment_text">Comment</label>
            <textarea name="comment_text" id="comment_text" rows="4"></textarea>
            <?php if (array_key_exists('comment_text', $errors)) : ?>
                <?php foreach ($errors['comment_text'] as $msg) ?>
                <div class="msg_error">
                    Error :<?php echo $msg; ?>
                </div>
            <?php endif; ?>
        </div>
        <input class="btn btn-green" type="submit" name="submit" value="Add Comment" />
    </form>

    <div class="comments_section">
        <h3>Comments</h3>
        <?php foreach ($post['comments'] as $comment) : ?>
            <div class="comment">
                <p class="comment_body">
                    NAME & EMAIL : <?php echo $comment['name']; ?> || <?php echo $comment['email']; ?>
                </p>
                <p class="comment_body">COMMENT : <?php echo $comment['text']; ?></p>
                <form method="post">
                    <input type="hidden" name="token" value="<?php echo $csrfToken ?>" />
                    <input type="hidden" name="_METHOD" value="DELETE" />
                    <input type="hidden" name="id" value="<?php echo $comment['id'] ?>" />
                    <input class="btn btn-red" type="submit" name="Delete" value="Delete Comment" />
                </form>
            </div>
        <?php endforeach; ?>
        <?php if (count($post['comments']) == 0) : ?>
            <div class="comment">
                <p class="comment_body">No comments ....</p>
            </div>
        <?php endif ?>
    </div>

    <footer>Footer</footer>
</body>

</html>