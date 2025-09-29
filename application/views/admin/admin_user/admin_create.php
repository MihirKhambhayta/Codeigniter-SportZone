<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Create User</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>  
                /* --- 1. Import Font & Global Styles --- */
            @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');

            :root {
            --primary-color: #007bff; /* A nice, modern blue */
            --primary-hover: #0056b3;
            --text-color: #333;
            --label-color: #555;
            --bg-color: #f4f7f9;
            --form-bg: #ffffff;
            --border-color: #ced4da;
            --focus-ring-color: rgba(0, 112, 231, 0.25);
            }

            body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--bg-color);
            color: var(--text-color);
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            }

            /* --- 2. Form Container Styling --- */
            .form-container {
            background-color: var(--form-bg);
            padding: 2.5rem; /* More generous padding */
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            box-sizing: border-box;
            }

            /* --- 3. Header and Form Elements --- */
            h1 {
            text-align: center;
            font-size: 1.75rem;
            font-weight: 600;
            margin-top: 0;
            margin-bottom: 2rem;
            }

            .form-group {
            margin-bottom: 1.5rem;
            }

            label {
            display: block;
            font-size: 0.9rem;
            font-weight: 500;
            margin-bottom: 0.5rem;
            color: var(--label-color);
            }

            input[type="text"],
            input[type="password"] {
            width: 100%;
            padding: 0.8rem 1rem;
            font-size: 1rem;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            box-sizing: border-box;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
            }

            /* --- 4. Interactive States (Focus) --- */
            input[type="text"]:focus,
            input[type="password"]:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 4px var(--focus-ring-color);
            }

            /* --- 5. Button Styling --- */
            .button-group {
            display: grid; /* Use grid for easy spacing */
            grid-template-columns: 1fr;
            gap: 0.75rem;
            margin-top: 2rem;
            }

            .btn {
            padding: 0.8rem 1rem;
            font-size: 1rem;
            font-weight: 500;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.2s ease, transform 0.1s ease;
            }

            .btn:hover {
            transform: translateY(-2px); /* Subtle lift effect */
            }

            .btn-primary {
            background-color: var(--primary-color);
            color: white;
            }

            .btn-primary:hover {
            background-color: var(--primary-hover);
            }

            .btn-secondary {
            background-color: transparent;
            color: var(--label-color);
            border: 1px solid var(--border-color);
            }

            .btn-secondary:hover {
            background-color: #f8f9fa; /* A very light gray for hover */
            border-color: #adb5bd;
            }
        </style>
    </head>
    <body>
        <div class="form-container">
            <h1>Create New Admin User</h1>
            <form action="<?php echo site_url('admin/admin_user/store'); ?>" method="POST">
                <div class="form-group">
                    <label for="username">Admin Name:</label>
                    <input type="text"  class="form-control" id="username" name="username" require>
                </div>
                <div class="form-group">
                    <label for ="password">Password:</label>
                    <input type="password" class="form-control" id="password" name="password" required pattern="\d{6}" title="Password must be exactly 6 digits">
                </div>
                <div class="button-group">
                    <button type="submit" class="btn btn-primary">Save User</button>
                    <a href="<?php echo site_url('admin/admin_user/admin_index'); ?>" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
     </body>
</html>