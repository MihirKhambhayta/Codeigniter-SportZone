<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Users List</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
        <style>
            body {
                background-color: #f8f9fa;
                padding-top: 50px;
            }
            .container {
                max-width: 1000px;
            }
            .table {
                background-color: #fff;
            }
            .table th, .table td {
                vertical-align: middle;
            }
            .btn {
                border-radius: 5px;
            }
            .btn-action {
                margin-left: 10px;
            }
            h1 {
                text-align: center;
                margin-bottom: 30px;
            }
            .search-box {
                margin-bottom: 20px;

            }
            .btn-back {
                background-color: #6c757d;
                color: white;
            }
        </style>
    </head>
    <body>

        <div class="container">
            <h1>Users List</h1>
            
            <div class="mb-3 search-box">
                <input type="text" id="searchInput" class="form-control" placeholder="Search users by name, email, or city">
            </div>
            
            <div class="mb-3">
                <a href="<?php echo site_url('users/create'); ?>" class="btn btn-primary">Create New User</a>
            </div>

          
            <table class="table table-striped table-bordered" id="usersTable">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>City</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($user->id); ?></td>
                            <td><?php echo htmlspecialchars($user->firstname); ?></td>
                            <td><?php echo htmlspecialchars($user->lastname); ?></td>
                            <td><?php echo htmlspecialchars($user->email); ?></td>
                            <td><?php echo htmlspecialchars($user->phone); ?></td>
                            <td><?php echo htmlspecialchars($user->city); ?></td>
                            <td>
                                <a href="<?php echo site_url('users/edit/'.$user->id); ?>" class="btn btn-warning btn-action">Edit</a>
                                <a href="<?php echo site_url('users/delete/'.$user->id); ?>" class="btn btn-danger btn-action" onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            
            <a href="<?php echo site_url('dashboard'); ?>" class="btn btn-back mt-3">Back</a>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>

         <script>
            $(document).ready(function() {
                $("#searchInput").on("keyup", function() {
                    var value = $(this).val().toLowerCase();
                    $("#usersTable tbody tr").filter(function() {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                    });
                });
            });
        </script>
    </body>
</html>
