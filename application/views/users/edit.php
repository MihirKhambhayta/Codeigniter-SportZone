<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit User</title>
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
                margin-bottom: 10px;
            }

            .btn-back {
                background-color: #6c757d;
                color: white;
            }
        </style>
    </head>

    <body>
         <div class="container">
                     <h1>Edit User</h1>
                <form action="<?php echo site_url('users/update/'.$user->id); ?>" method="POST">
                        
                        <div class="form-group">
                            <label for="firstname">First Name:</label>
                            <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo htmlspecialchars($user->firstname); ?>" required>
                        </div>
                
                        <div class="form-group">
                            <label for="lastname">Last Name:</label>
                            <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo htmlspecialchars($user->lastname); ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($user->email); ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone:</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="<?php echo htmlspecialchars($user->phone); ?>"required pattern="\d{10}" title="Phone must be exactly 10 digits">
                         </div>

                       

                         <div class="form-group">
                                <label for="city">City:</label>
                            <select class="form-control" id="city" name="city" required>
                                <option value="">-- Select City --</option>
                                <option value="Ahmedabad" <?php if ($user->city == 'Ahmedabad') echo 'selected'; ?>>Ahmedabad</option>
                                <option value="Surat" <?php if ($user->city == 'Surat') echo 'selected'; ?>>Surat</option>
                                <option value="Rajkot" <?php if ($user->city == 'Rajkot') echo 'selected'; ?>>Rajkot</option>
                                <option value="Vadodara" <?php if ($user->city == 'Vadodara') echo 'selected'; ?>>Vadodara</option>
                                <option value="Bhavnagar" <?php if ($user->city == 'Bhavnagar') echo 'selected'; ?>>Bhavnagar</option>
                            </select>
                        </div>


                        <button type="submit" class="btn btn-success">Update User</button>
                        <button type="button" class="btn btn-back" onclick="goBack()">Back</button>
                </form>
            </div>

        
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>

            <script>
                function goBack() {
                    window.history.back();  // Goes back to the previous page in the browser history
                }
            </script>
    </body>
</html>
 