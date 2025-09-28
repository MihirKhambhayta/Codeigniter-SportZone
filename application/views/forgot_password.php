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
        input[type="password"],
        input[type="number"] {
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

        input[disabled] {
            background-color: #ccc !important;
            cursor: not-allowed;
        }

        .error-message {
            color: red;
            margin-bottom: 15px;
            font-weight: bold;
        }

        .success-message {
            color: green;
            margin-bottom: 15px;
            font-weight: bold;
        }

        .info-message {
            color: #333;
            margin-bottom: 15px;
            font-size: 14px;
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

    <?php if (isset($otp_attempts) && $otp_attempts < 3): ?>
        <div class="info-message">
            You have used <?= $otp_attempts ?> of 3 OTP requests.
        </div>
    <?php endif; ?>

    <?php if ($this->session->flashdata('error')): ?>
        <div class="error-message"><?= $this->session->flashdata('error'); ?></div>
    <?php endif; ?>

    <?php if ($this->session->flashdata('success')): ?>
        <div class="success-message"><?= $this->session->flashdata('success'); ?></div>
    <?php endif; ?>

    <?php if (!isset($show_otp_form)): ?>
        <!-- STEP 1: Email input -->
        <form method="post" action="<?= site_url('login/send_otp') ?>">
            <input type="text" name="email" placeholder="Enter your registered email" required>
            <input type="submit" value="Send OTP">
        </form>
    <?php else: ?>
        <!-- STEP 2: OTP + new password -->
        <form method="post" action="<?= site_url('login/reset_password') ?>" id="reset-password-form">
            <input type="hidden" name="email" value="<?= $email ?>">
            <input type="number" name="otp" placeholder="Enter OTP sent to your email" required>
            <input type="password" name="new_password" placeholder="New Password (6 digits)" required pattern="\d{6}" title="Password must be exactly 6 digits">

            <div id="otp-timer" style="margin: 10px 0; color: red;">
                OTP will expire in <span id="seconds-left">60</span> seconds.
            </div>

            <input type="submit" id="reset-btn" value="Reset Password">
        </form>

        <!-- Resend OTP (hidden initially) -->
        <form method="post" action="<?= site_url('login/send_otp') ?>" id="resend-otp-form" style="display: none; margin-top: 10px;">
            <input type="hidden" name="email" value="<?= $email ?>">
            <input type="submit" value="Resend OTP">
        </form>
    <?php endif; ?>

    <p><a href="<?= site_url('login') ?>">← Back to Login</a></p>
</div>

<script>
    let secondsLeft = 60;
    const timerDisplay = document.getElementById('seconds-left');
    const resetBtn = document.getElementById('reset-btn');
    const resendForm = document.getElementById('resend-otp-form');

    const countdown = setInterval(() => {
        secondsLeft--;
        timerDisplay.textContent = secondsLeft;

        if (secondsLeft <= 0) {
            clearInterval(countdown);
            timerDisplay.textContent = 'Expired';
            resetBtn.disabled = true;
            resetBtn.value = 'OTP Expired';
            resetBtn.style.backgroundColor = '#ccc';

            // Show Resend OTP form
            resendForm.style.display = 'block';
        }
    }, 1000);
</script>
</body>
</html>
