<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>SportZone</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    
    
    <style>
        * { 
          box-sizing: border-box; 
          margin:0; padding:0; 
          }
        body { 
          font-family: Arial, sans-serif;
          background:#f5f5f5; 
          color:#333; 
          line-height:1.5; 
          }
        .hero { 
          background:#0056b3; 
          color:#fff; text-align:center; 
          padding:2rem 1rem;
        }
        .hero h1 {
        margin-bottom: 0.5rem; 
        } 
        .hero p {
        max-width: 600px; 
        margin: 0 auto; 
        }
        .content {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around; 
        padding: 2rem 1rem;
        }
        .content .intro {
        flex: 1 1 300px; 
        margin: 1rem;
        }
        .content .form-box {
        flex: 1 1 300px;
        background: #fff;
        padding: 2rem;
        border-radius: 5px; 
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1); 
        margin: 1rem;
        }
        @media (max-width: 700px) {
          .content {
            flex-direction: column; 
            align-items: center; 
        }
        }
        .navbar {
        background-color: #004a99; 
        color: white;
        padding: 15px 30px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        }
        .navbar a {
        color: white;
        margin-left: 15px;
        text-decoration: none;
        font-weight: bold; 
        }
        footer {
        background-color: #343a40; 
        color: white;
        padding: 20px;
        }
        footer p {
        margin: 10px 0;
        }
        .social-icons {
        margin-top: 10px;
        }
        .social-icon {
        color: white;
        margin: 0 15px;
        font-size: 18px;
        text-decoration: none;
        transition: color 0.3s ease; 
        }
        .social-icon:hover {
        color: #4CAF50; 
        }
        .social-icon i {
        margin-right: 8px; 
        }

    </style>
  </head>
  <body>
      <nav class="navbar">
        <div class="logo"><strong>SportZone</strong></div>
        <div class="nav-links">
          <a href="<?php echo site_url('users/index'); ?>">User Management</a>
          <a href="<?php echo site_url('teams'); ?>">Teams</a>   
          <a href="<?php echo site_url('contact'); ?>">Contact</a>
          <a href="<?php echo site_url('help'); ?>">Help</a>
          <a href="<?php echo site_url('logout'); ?>">Logout</a>
        </div>
      </nav>

       <section class="hero">
          <h2>Welcome, </h2>
          <p>Place your bets on your favorite sports with competitive odds, live updates, and exclusive bonuses.</p>
       </section>

        <section class="content">
          <div class="intro">
            <h2>Why SportZone?</h2>
            <ul>
              <li>Wide range of sports markets</li>
              <li>User-friendly interface and live streaming</li>
              <li>Fast payments, secure and licensed</li>
              <li>Welcome bonuses and in-play features</li>
            </ul>
          </div>
        </section>

        <footer class="text-center py-4 bg-dark text-light">
          <p>&copy; 2025 SportZone | All Rights Reserved</p>
          <p>Follow us on:</p>
          <div class="social-icons">
            <a href="https://facebook.com" target="_blank" class="social-icon"><i class="fab fa-facebook-f"></i> Facebook</a>
            <a href="https://twitter.com" target="_blank" class="social-icon"><i class="fab fa-twitter"></i> Twitter</a>
            <a href="https://instagram.com" target="_blank" class="social-icon"><i class="fab fa-instagram"></i> Instagram</a>
          </div>
        </footer>

        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    </body>
</html>
