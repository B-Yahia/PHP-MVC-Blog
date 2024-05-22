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
        <div class="signup_card">
            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" name="first_name" id="first_name" required />
            </div>
            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" name="last_name" id="last_name" required />
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" required />
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" required />
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required />
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" name="confirm_password" id="confirm_password" required />
            </div>
            <div class="form-group">
                <label for="dob">Date of Birth</label>
                <input type="date" name="dob" id="dob" required />
            </div>
            <input type="submit" name="submit" value="Signup" />
        </div>
    </form>
    <footer>Footer</footer>
</body>

</html>