<!DOCTYPE html>
<html lang="en">
   <head>
       <meta charset="UTF-8" />
       <title>Login Page</title>
       <style>
            body {
                align-items: center;
                justify-content: center;
                display: flex;
                font-family: sans-serif;
                line-height: 1.5;
                min-height: 100vh;
                background: #f3f3f3;
                flex-direction: column;
                margin: 0;
            }

            .main {
                background-color: #fff;
                border-radius: 15px;
                padding: 20px 30px;
                box-shadow: 0 0 20px burlywood;
                width: 400px;
                text-align: center;
            }

            h2 {
                color: #4CAF50;
                margin-bottom: 20px;
            }

            label {
                display: block;
                width: 100%;
                margin-top: 10px;
                margin-bottom: 5px;
                text-align: left;
                color: #555;
                font-weight: bold;
            }

            input[type="text"],
            input[type="password"] {
                display: block;
                width: 100%;
                margin-bottom: 15px;
                padding: 10px;
                box-sizing: border-box;
                border: 1px solid #ddd;
                border-radius: 5px;
                font-size: 16px;
            }

            input[type="submit"] {
                padding: 15px;
                border-radius: 10px;
                margin-top: 15px;
                margin-bottom: 15px;
                border: none;
                color: white;
                background-color: #4CAF50;
                width: 100%;
                font-size: 16px;
                cursor: pointer;
                transition: background-color 0.3s ease;
            }

            input[type="submit"]:hover {
                background-color: #3d279cff;
            }

            .error-message {
                color: red;
                margin-bottom: 15px;
                font-weight: bold;
                text-align: center;
            }
            .forgot-password-link {
            text-decoration: none;
            color: #4CAF50;
            font-weight: bold;
            font-size: 14px;
            transition: color 0.3s;
            }

            .forgot-password-link:hover {
            color: #2e7d32; /* darker green on hover */
            text-decoration: underline;
            }
        </style>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>
    <body>
        <div class="main">
            <h2>Login</h2>
            <?php if ($this->session->flashdata('success')): ?>
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: "<?= $this->session->flashdata('success'); ?>",
                        confirmButtonColor: '#3085d6'
                    });
                </script>
            <?php endif; ?>

            <?php if ($this->session->flashdata('error')): ?>
                <p class="error-message"><?php echo $this->session->flashdata('error'); ?></p>
            <?php endif; ?>

            <form method="post" action="<?php echo site_url('login/process'); ?>">
                <label for="firstname">Username:</label>
                <input type="text" id="firstname" name="firstname" required autofocus placeholder="Enter First Name">

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" "required pattern="\d{6}" title="Password must be exactly 6 digits" placeholder="Enter Pasword">
                
                <input type="submit" value="Login">
            </form>
            <h5>
                <a href="<?= site_url('login/forgot_password') ?>" class="forgot-password-link">Forgot Password?</a>
            </h5>

            <p>Don't have account yet? 
                <a href="register" style="text-decoration: none;">
                    Registration
                 </a> 
            </p>
        </div>
  </body>
</html>
