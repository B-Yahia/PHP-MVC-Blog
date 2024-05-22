<?php

?>

<!DOCTYPE html>
<html>

<head>
    <title>A blog app - <?php echo $title ?></title>
    <?php require __DIR__ . "/../partials/head.php"; ?>

</head>

<body>
    <?php require __DIR__ . "/../partials/top_menu.php"; ?>
    <form method="post">
        <div class="login_card">
            <div class="username">
                <label for="username">Username</label><input type="text" name="username" id="username" />
            </div>
            <div class="password">
                <label for="password">Password</label><input type="text" name="username" id="username" />
            </div>
            <input type="submit" name="submit" value="Login" />
        </div>
    </form>

    <footer>Footer</footer>
</body>

</html>