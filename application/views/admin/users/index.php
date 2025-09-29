<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Users List</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        
        <style>
    body {
        background-color: #f4f6f9;
        padding-top: 20px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .container {
        max-width: 95%;
        background-color: #ffffff;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    }

    h1 {
        text-align: center;
        margin-bottom: 30px;
        font-weight: 600;
        color: #343a40;
    }

    .search-box input {
        border-radius: 8px;
        padding: 10px;
        border: 1px solid #ced4da;
    }

    .table {
        background-color: #fff;
        border-radius: 10px;
        overflow: hidden;
    }

    .table thead {
        background-color: #343a40;
        color: white;
    }

    .table th, .table td {
        vertical-align: middle;
        text-align: center;
        padding: 12px;
        font-size: 15px;
    }

    .btn {
        border-radius: 6px;
        font-size: 14px;
        padding: 6px 12px;
    }

    .btn-action {
        margin: 2px;
    }

    .btn-warning {
        background-color: #f0ad4e;
        border-color: #eea236;
        color: white;
    }

    .btn-warning:hover {
        background-color: #ec971f;
        border-color: #d58512;
    }

    .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
        color: white;
    }

    .btn-danger:hover {
        background-color: #c82333;
        border-color: #bd2130;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-primary:hover {
        background-color: #0069d9;
        border-color: #0062cc;
    }

    .form-select, .form-control {
        border-radius: 8px;
    }

    .btn-back {
        background-color: #6c757d;
        color: white;
        border-radius: 6px;
        padding: 8px 16px;
    }

    .btn-back:hover {
        background-color: #5a6268;
        transform: translateY(-2px); 
    }

    @media screen and (max-width: 768px) {
        .table th, .table td {
            font-size: 13px;
        }

        .btn {
            font-size: 12px;
            padding: 5px 10px;
        }
    }
    
</style>

    </head>
    <body>
        <div class="container">
            <h1>Users List</h1>
             <div class=" mb-3 search-box">
                <input type="text" id="searchInput" class="form-control" placeholder="Search users by name, email, or city">
            </div>
            
            <div class="row mb-4">
                <div class="col-md-10">
                    <a href="<?php echo site_url('admin/users/create'); ?>" class="btn btn-primary">Create New User</a>
                </div>
                <div class="col-md-2">
                    <select id="rowsSelect" class="form-select">
                        <option value="all">Show All</option>
                        <option value="5">Show 5</option>
                        <option value="10">Show 10</option>
                        <option value="50">Show 50</option>
                        
                    </select>
                </div>
            </div>

            <p><strong>Total <span id="userCount">0</span> user(s)</strong></p>
    <div class="table-responsive">
      <table class="table table-striped table-bordered table-hover align-middle text-center shadow-sm rounded" id="usersTable">


            <thead>
                    <tr>
                        <th>Id</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Both Date</th>
                        <th>City</th>
                        <th>active</th>
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
                            <td><?php echo htmlspecialchars($user->date); ?></td>
                            <td><?php echo htmlspecialchars($user->city); ?></td>
                            <td><?php echo htmlspecialchars($user->is_logged_in	); ?></td>
                            <td>
                                <a href="<?php echo site_url('admin/users/edit/'.$user->id); ?>" class="btn btn-warning btn-action">Edit</a>
                                <a href="<?= site_url('admin/logout_user/'.$user->id) ?>" class="btn btn-danger">Logout</a>
                                <a href="<?php echo site_url('admin/users/delete/'.$user->id); ?>" class="btn btn-danger btn-action" onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>

                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            
            <a href="<?php echo site_url('admin/dashboard'); ?>" class="btn btn-back mt-3">Back</a>
        </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>

         <script>
            $(document).ready(function () {
                const $rows = $('#usersTable tbody tr');

                function filterTable() {
                    const searchValue = $("#searchInput").val().toLowerCase();
                    const limit = $("#rowsSelect").val();
                    let count = 0;

                    $rows.each(function (index) {
                        const rowText = $(this).text().toLowerCase();
                        const matchesSearch = rowText.indexOf(searchValue) > -1;

                        if (matchesSearch) {
                            count++;
                            if (limit === 'all' || count <= parseInt(limit)) {
                                $(this).show();
                            } else {
                                $(this).hide();
                            }
                        } else {
                            $(this).hide();
                        }
                    });

                    // ✅ Update total visible user count
                    $("#userCount").text(count);
                }

                $("#searchInput").on("keyup", filterTable);
                $("#rowsSelect").on("change", filterTable);

                // Initial display
                filterTable();
            });
        </script>
    </body>
</html>
