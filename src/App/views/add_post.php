<?php

?>

<!DOCTYPE html>
<html>

<head>
    <?php require __DIR__ . "/../partials/head.php"; ?>
    <link rel="stylesheet" type="text/css" href="../../../public/assets/add_post.css" />
</head>

<body>
    <?php require __DIR__ . "/../partials/top_menu.php"; ?>
    <form method="post">
        <input type="hidden" name="token" value="<?php echo $csrfToken ?>" />
        <div class="add_post_card">
            <div class="form-group">
                <label for="title">Post Title</label>
                <input type="text" name="title" id="title" value="<?php echo $post['title'] ?? "" ?>" />
                <?php if (array_key_exists('title', $errors)) : ?>
                    <?php foreach ($errors['title'] as $msg) ?>
                    <div class="msg_error">
                        Error :<?php echo $msg; ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="content">Post Content</label>
                <textarea name="content" id="content" rows="10" required><?php echo $post['content'] ?? ""; ?></textarea>
                <?php if (array_key_exists('content', $errors)) : ?>
                    <?php foreach ($errors['content'] as $msg) ?>
                    <div class="msg_error">
                        Error :<?php echo $msg; ?>
                    </div>
                <?php endif; ?>
            </div>
            <input type="submit" name="submit" value="Add Post" />
        </div>
    </form>
    <footer>Footer</footer>
</body>

</html>