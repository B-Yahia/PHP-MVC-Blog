<?php

?>

<!DOCTYPE html>
<html>

<head>
    <?php require __DIR__ . "/../partials/head.php"; ?>
    <link rel="stylesheet" type="text/css" href="../../../public/assets/login.css" />
</head>

<body>
    <?php require __DIR__ . "/../partials/top_menu.php"; ?>
    <form method="post">
        <input type="hidden" name="token" value="<?php echo $csrfToken ?>" />
        <div class="login_card">
            <div class="username">
                <label for="username">Username</label><input type="text" name="username" id="username" value="<?php echo $oldFormData['username'] ?? ""; ?>" />
                <?php if (array_key_exists('username', $errors)) : ?>
                    <?php foreach ($errors['username'] as $msg) ?>
                    <div class="msg_error">
                        Error :<?php echo $msg; ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="password">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" />
                <?php if (array_key_exists('password', $errors)) : ?>
                    <?php foreach ($errors['password'] as $msg) ?>
                    <div class="msg_error">
                        Error :<?php echo $msg; ?>
                    </div>
                <?php endif; ?>
            </div>
            <input class="btn btn-blue" type="submit" name="submit" value="Login" />
        </div>
    </form>

    <footer>Footer</footer>
</body>

</html>