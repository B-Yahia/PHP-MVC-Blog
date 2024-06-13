<?php

?>

<!DOCTYPE html>
<html>

<head>
    <?php require __DIR__ . "/../partials/head.php" ?>
    <link rel="stylesheet" type="text/css" href="../../../public/assets/index.css" />
</head>

<body>
    <?php require __DIR__ . "/../partials/top_menu.php"; ?>
    <?php foreach ($posts as $post) : ?>
        <div class="post-card">
            <h3 class="post-title"><?php echo $post['title'] ?> </h3>
            <p class="post-body"><?php echo $post['content'] ?></p>
            <div class="post-card-btns">
                <a class="btn btn-blue" href="post?id=<?php echo $post['id'] ?>">read more </a>
                <a class="btn btn-blue" href="add_post?id=<?php echo $post['id'] ?>">Edit post</a>
                <form method="post">
                    <input type="hidden" name="token" value="<?php echo $csrfToken ?>" />
                    <input type="hidden" name="_METHOD" value="DELETE" />
                    <input type="hidden" name="id" value="<?php echo $post['id'] ?>" />
                    <input class="btn btn-red" type="submit" name="Delete" value="DeletePost" />
                </form>
            </div>
            <p> <span class="badge"> Comments Nbr : <?php echo $post['comment_count'] ?> </span> <span class="badge">Author : <?php echo $post['username'] ?> </span> </p>
        </div>
    <?php endforeach; ?>


    <footer>Footer</footer>
</body>

</html>