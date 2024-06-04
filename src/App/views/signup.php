<!DOCTYPE html>
<html>

<head>
    <title><?php echo $title ?> - A blog app </title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="../../../public/assets/main.css" />
</head>

<body>
    <?php require __DIR__ . "/../partials/top_menu.php"; ?>
    <form method="post">
        <div class="signup_card">
            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" name="first_name" id="first_name" value="<?php echo $oldFormData['first_name'] ?? ""; ?>" />
                <?php if (array_key_exists('first_name', $errors)) : ?>
                    <?php foreach ($errors['first_name'] as $msg) ?>
                    <div class="msg_error">
                        Error :<?php echo $msg; ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" name="last_name" id="last_name" value="<?php echo $oldFormData['last_name'] ?? ""; ?>" />
                <?php if (array_key_exists('last_name', $errors)) : ?>
                    <?php foreach ($errors['last_name'] as $msg) ?>
                    <div class="msg_error">
                        Error :<?php echo $msg; ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" value="<?php echo $oldFormData['username'] ?? ""; ?>" />
                <?php if (array_key_exists('username', $errors)) : ?>
                    <?php foreach ($errors['username'] as $msg) ?>
                    <div class="msg_error">
                        Error :<?php echo $msg; ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="<?php echo $oldFormData['email'] ?? ""; ?>" />
                <?php if (array_key_exists('email', $errors)) : ?>
                    <?php foreach ($errors['email'] as $msg) ?>
                    <div class="msg_error">
                        Error :<?php echo $msg; ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" />
                <?php if (array_key_exists('password', $errors)) : ?>
                    <?php foreach ($errors['password'] as $msg) ?>
                    <div class="msg_error">
                        Error :<?php echo $msg; ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" name="confirm_password" id="confirm_password" />
                <?php if (array_key_exists('confirm_password', $errors)) : ?>
                    <?php foreach ($errors['confirm_password'] as $msg) ?>
                    <div class="msg_error">
                        Error :<?php echo $msg; ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="dob">Date of Birth</label>
                <input type="date" name="dob" id="dob" value="<?php echo $oldFormData['dob'] ?? ""; ?>" />
                <?php if (array_key_exists('dob', $errors)) : ?>
                    <?php foreach ($errors['dob'] as $msg) ?>
                    <div class="msg_error">
                        Error :<?php echo $msg; ?>
                    </div>
                <?php endif; ?>
                <?php if (array_key_exists('age', $errors)) : ?>
                    <?php foreach ($errors['age'] as $msg) ?>
                    <div class="msg_error">
                        Error :<?php echo $msg; ?>
                    </div>
                <?php endif; ?>
            </div>
            <input type="submit" name="submit" value="Signup" />
        </div>
    </form>
    <footer>Footer</footer>
</body>

</html>