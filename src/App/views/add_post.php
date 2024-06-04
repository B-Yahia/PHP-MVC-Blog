<?php

?>

<!DOCTYPE html>
<html>

<head>
    <?php require __DIR__ . "/../partials/head.php"; ?>
</head>

<body>
    <?php require __DIR__ . "/../partials/top_menu.php"; ?>
    <form method="post">
        <div class="add_post_card">
            <div class="form-group">
                <label for="title">Post Title</label>
                <input type="text" name="title" id="title" required />
            </div>
            <div class="form-group">
                <label for="content">Post Content</label>
                <textarea name="content" id="content" rows="10" required></textarea>
            </div>
            <input type="submit" name="submit" value="Add Post" />
        </div>
    </form>
    <footer>Footer</footer>
</body>

</html>