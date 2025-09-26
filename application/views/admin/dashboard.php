<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>

    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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
            font-size: 18px;
        }

        .user {
            background-color: #fff;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            margin-bottom: 30px;
        }

        .user h2 {
            margin-bottom: 20px;
            color: #2c3e50;
        }

        .cards {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
            justify-content: center;
        }

        .card {
            flex: 1 1 250px;
            max-width: 300px;
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

        .card h4 {
            margin: 0;
            font-size: 22px;
        }

        canvas {
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <div class="sidebar">
        <h3 style="text-align: center;">Admin Panel</h3>
        <a href="<?= base_url('admin/dashboard') ?>">📊 Dashboard</a>
        <a href="<?= base_url('admin/users/index') ?>">👥 Manage Users</a>
        <a href="<?= base_url('admin/admin_user/admin_index') ?>">👤 Admin User</a>
        <a href="<?= base_url('admin/message/admin_message') ?>">💬 Message</a>
        <a href="<?= base_url('admin/logout') ?>">🚪 Logout</a>
    </div>

    <div class="main-content">
        <div class="header">
            Welcome, <?= $this->session->userdata('admin_username') ?>
        </div>  

        <h2>Dashboard</h2>
        <p>This is your admin dashboard. From here, you can manage users, view stats, and more.</p>

        <section class="content">
            <div class="intro">
                <h2>User</h2>
                <div class="dashboard">
                    <div class="user">
                        <h2>👥 User Detail</h2>
                        <div class="cards">
                            <div class="card">
                                <h3>Total Users</h3>
                                <h4><strong><?= $total_users; ?></strong></h4>
                            </div>
                            <div class="card">
                                <h3>Logged In Users</h3>
                                <h4><strong><?= $logged_in_users; ?></strong></h4>
                            </div>
                            <div class="card" style="background: #fff; color: #333;">
                                <h3 style="color: #2c3e50;">User Stats</h3>
                                <canvas id="userChart" width="300" height="220"></canvas>
                            </div>
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
                                <h3>Total Admin Users</h3>
                                <h4><strong><?= $total_admins; ?></strong></h4>
                            </div>
                            <div class="card">
                                <h3>Logged In Admins</h3>
                                <h4><strong><?= $logged_in_admins; ?></strong></h4>
                            </div>
                            <div class="card">
                                <h3>Total Messages</h3>
                                <h4><strong><?= $total_message; ?></strong></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Chart Script -->
    <script>
        const ctx = document.getElementById('userChart').getContext('2d');
        const userChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Users', 'Logged In Users', 'Admins', 'Logged In Admins', 'Messages'],
                datasets: [{
                    label: 'Count',
                    data: [
                        <?= $total_users ?>,
                        <?= $logged_in_users ?>,
                        <?= $total_admins ?>,
                        <?= $logged_in_admins ?>,
                        <?= $total_message ?>
                    ],
                    backgroundColor: [
                        '#007bff',
                        '#28a745',
                        '#ffc107',
                        '#fd7e14',
                        '#dc3545'
                    ],
                    borderRadius: 8,
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });
    </script>

</body>
</html>
