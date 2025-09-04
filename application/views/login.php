<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
    </head>
    <body>
        <h2>Login Page</h2>
        <form method="post" action="<?php echo base_url('auth/login_submit'); ?>">
            <label>Firstname:</label>
            <input type="text" name="firstname" required><br><br>

            <label>Password:</label>
            <input type="password" name="password" required><br><br>

            <button type="submit">Login</button>
        </form>

        <p>Don't have an account? <a href="<?php echo base_url('auth/register'); ?>">Register here</a></p>
    </body>
</html>
