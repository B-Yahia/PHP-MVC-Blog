<div class="top-menu">
    <h1 class="logo"><a href="/">Blog php MVC</a></h1>
    <div class="menu">
        <ul>
            <?php if (isset($_SESSION['user'])) : ?>
                <li><a href="/add_post">Add post</a></li>
                <li><a href="/logout">Logout</a></li>
            <?php endif; ?>
            <?php if (!isset($_SESSION['user'])) : ?>
                <li><a href="/login">Login</a></li>
                <li><a href="/signup">Signup</a></li>
            <?php endif; ?>
            <li><a href="/about">About</a></li>
        </ul>
    </div>
</div>