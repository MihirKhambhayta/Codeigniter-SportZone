<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            display: flex;
        }
        .sidebar {
            width: 220px;
            background: #2c3e50;
            color: #fff;
            height: 100vh;
            padding-top: 20px;
        }
        .sidebar a {
            display: block;
            color: #ecf0f1;
            padding: 12px 20px;
            text-decoration: none;
        }
        .sidebar a:hover {
            background: #34495e;
        }
        .main-content {
            flex-grow: 1;
            padding: 20px;
        }
        .header {
            background: #3498db;
            color: white;
            padding: 15px 20px;
        }
     
         .user {
      background-color: #fff;
      border-radius: 12px;
      padding: 20px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
      }
      .user h2 {
      margin-bottom: 20px;
      color: #2c3e50;
      }
      .cards {
      display: flex;
      gap: 20px;
      flex-wrap: wrap;
      }
      .card {
      flex: 1 1 200px;
      background: linear-gradient(135deg, #2980b9, #6dd5fa);
      color: white;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
      transition: transform 0.2s ease-in-out;
      }
      .card h3 {
      margin: 0 0 10px;
      font-size: 18px;
      }
      .card p {
      font-size: 14px;
      }
    </style>
</head>
<body>

    <div class="sidebar">
        <h3 style="text-align: center;">Admin Panel</h3>
        <a href="<?= base_url('admin/dashboard') ?>">Dashboard</a>
        <a href="<?= base_url('admin/users/index') ?>">👥 manage users</a>
        <a href="<?= base_url('admin/admin_user/admin_index') ?>">👤 Admin User</a>
        <a href="<?= base_url('admin/logout') ?>">Logout</a>
        
    </div>

    <div class="main-content">
        <div class="header">
            Welcome, <?= $this->session->userdata('admin_username') ?>
        </div>  

        <h2>Dashboard</h2>
        <p>This is your admin dashboard. From here, you can manage users, view stats, and more.</p>

        <!-- You can add widgets or stats here -->
        

        <section class="content">
          <div class="intro">
            <h2>User</h2>
          
            <div class="dashboard">
              <div class="user">
                <h2>👥 User Detail</h2>
                  <div class="cards">
                    <div class="card">
                      <h3>Total User</h3>
                      <p><h4> <strong><?php echo $total_users; ?></strong></h4></p>
                      
                    </div>
                    <div class="card">
                      <h3></h3>
                      <p><p>Logged In Users: <strong><?= $logged_in_users ?></strong></p></p>
                      
                    </div>
                    <div class="card">
                      <h3></h3>
                      <p></p>
                      <p></p>
                  </div>
              </div>
            </div>
         </div>
        </section>

         <section class="content">
          <div class="intro">
            <div class="dashboard">
              <div class="user">
                <h2>👤 Admin User Detail</h2>
                  <div class="cards">
                    <div class="card">
                      <h3>Total User</h3>
                      <p><h4> <strong><?php echo $total_admins; ?></strong></h4></p>
                      
                    </div>
                    <div class="card">
                      <h3></h3>
                      <p><p>Logged In Users: <strong><?= $logged_in_admins ?></strong></p></p>
                      
                    </div>
                    <div class="card">
                      <h3></h3>
                      <p></p>
                      <p></p>
                  </div>
              </div>
            </div>
         </div>
        </section>
    </div>

    <script>
        
    </script>

</body>
</html>
