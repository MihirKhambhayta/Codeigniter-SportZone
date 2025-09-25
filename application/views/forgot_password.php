<!DOCTYPE html>
<html lang="en">
   <head>
     <meta charset="UTF-8">
     <title>Forgot Password</title>
        <style>
            body {
            background: #f5f5f5;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            }

            .container {
            background-color: #ffffff;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
            }

            h2 {
            color: #4CAF50;
            margin-bottom: 20px;
            }

            input[type="text"],
            input[type="password"] {
            width: 100%;
            padding: 12px 15px;
            margin: 10px 0 20px 0;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
            font-size: 14px;
            }

            input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
            transition: background-color 0.3s ease;
            }

            input[type="submit"]:hover {
            background-color: #45a049;
            }

            .error-message {
            color: red;
            margin-bottom: 15px;
            font-weight: bold;
            }

            a {
            text-decoration: none;
            color: #4CAF50;
            font-size: 14px;
            }

            a:hover {
            text-decoration: underline;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h2>Reset Password</h2>

            <?php if ($this->session->flashdata('error')): ?>
                <div class="error-message">
                    <?php echo $this->session->flashdata('error'); ?>
                </div>
            <?php endif; ?>

            <form method="post" action="<?= site_url('login/reset_password') ?>">
                <input type="text" name="firstname" placeholder="Enter your registered firstname" required>
                <input type="password" name="new_password" placeholder="New Password" "required pattern="\d{6}" title="Password must be exactly 6 digits" placeholder="Enter Pasword">
                <input type="submit" value="Reset Password">
            </form>

            <p><a href="<?= site_url('login') ?>">← Back to Login</a></p>
                
        </div>
    </body>
</html>
