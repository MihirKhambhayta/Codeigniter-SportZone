<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Create User</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        
        <style>
            body {
                background-color: #f8f9fa;
                padding-top: 50px;
            }
            .container {
                max-width: 600px;
                background-color: #fff;
                padding: 30px;
                border-radius: 10px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            }
            h1 {
                text-align: center;
                margin-bottom: 20px;
            }
            .form-group {
                margin-bottom: 15px;
            }
            .form-control {
                border-radius: 5px;
            }
            .btn {
                border-radius: 5px;
                width: 100%;
                margin-bottom: 10px; /* Space between buttons */
            }
            .btn-back {
                background-color: #6c757d;
                color: white;
            }

            .btn-back {
                background-color: #6c757d;
                color: white;
            }
        </style>
    </head>
    <body>
            <div class="container">
                <h1>Create New Admin User</h1>
                <form action="<?php echo site_url('admin/admin_user/store'); ?>" method="POST">
                    
                    
                    <div class="form-group">
                        <label for="username">Admin Name:</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>

                    <div class="form-group>
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" required pattern="\d{6}" title="Password must be exactly 6 digits">
                    </div>
                    
                 
                    
                   
                
                    <button type="submit" class="btn btn-primary">Save User</button>
                    <a href="<?php echo site_url('admin/admin_user/admin_index'); ?>" class="btn btn-danger">Cancel</a>
                </form>
            </div>
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
     </body>
</html>