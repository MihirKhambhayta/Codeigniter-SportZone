<!DOCTYPE html>
<html>
    <head>
        <title>User Registration</title>
        <style>
            body {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 110vh;
                margin: 0;
                background-color: #f5f5f5;
                font-family: Arial, sans-serif;
            }

            .main {
                background-color: #fff;
                border-radius: 15px;
                padding: 10px 20px;
                box-shadow: 0 0 20px burlywood;
                width: 400px;
            
                text-align: center;
            }

            h1 {
                background: #9986ec;
                color: white;
                padding: 10px;
                border-radius: 10px;
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

            input, select {
                display: block;
                width: 100%;
                margin-bottom: 15px;
                padding: 10px;
                box-sizing: border-box;
                border: 1px solid #ddd;
                border-radius: 5px;
            }

            .alert {
                margin-bottom: 15px;
                padding: 10px;
                border-radius: 5px;
            }

            .alert-success {
                background-color: #d4edda;
                color: #155724;
            }

            .alert-danger {
                background-color: #f8d7da;
                color: #721c24;
            }

            button[type="submit"] {
                padding: 15px;
                border-radius: 10px;
                margin-top: 15px;
                margin-bottom: 15px;
                border: none;
                color: white;
                background-color: #575296ff;
                width: 100%;
                font-size: 16px;
                cursor: pointer;
                transition: background-color 0.3s ease;
            }

            button[type="submit"]:hover {
                background-color: #3d279cff;
            }

        </style>
    </head>
    <body>

        <div class="main">
            <h1>User Registration</h1>

            <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
            <?php endif; ?>

            <?= validation_errors('<div class="alert alert-danger">', '</div>'); ?>

            <form method="post" action="<?= site_url('register/process'); ?>">
                <label>First Name</label>
                <input type="text" name="firstname" value="<?= set_value('firstname'); ?>" placeholder="Enter your First Name">

                <label>Last Name</label>
                <input type="text" name="lastname" value="<?= set_value('lastname'); ?>"  placeholder="Enter your Last Name">

                <label>Email</label>
                <input type="email" name="email" value="<?= set_value('email'); ?>" placeholder="Enter your Email Address">

                <label>Password</label>
                <input type="password" name="password" " pattern="\d{6}" title="Password must be exactly 6 digits" placeholder="Enter your Password" required>

                <label>Phone</label>
                <input type="text" name="phone" value="<?= set_value('phone'); ?>"  "required pattern="\d{10}" title="Phone must be exactly 10 digits"  placeholder="10-digit number">

                <label>Both Date</label>
                <input type="date" name="date" value="<?= set_value('date'); ?>" required>

                <div class="form-group">
                    <label for="city">City:</label>
                    <select class="form-control" id="city" name="city" required>
                        <option value="">-- Select City --</option>
                        <option value="Ahmedabad" <?= set_select('city', 'Ahmedabad'); ?>>Ahmedabad</option>
                        <option value="Surat" <?= set_select('city', 'Surat'); ?>>Surat</option>
                        <option value="Rajkot" <?= set_select('city', 'Rajkot'); ?>>Rajkot</option>
                        <option value="Vadodara" <?= set_select('city', 'Vadodara'); ?>>Vadodara</option>
                        <option value="Bhavnagar" <?= set_select('city', 'Bhavnagar'); ?>>Bhavnagar</option>
                    </select>
                </div>

                <button type="submit">Register</button>
            </form>

            <p>Alredy have account?
                <a href="login" style="text-decoration: none;">
                    login
                </a>
            </p> 
        </div>
    </body>
</html>
