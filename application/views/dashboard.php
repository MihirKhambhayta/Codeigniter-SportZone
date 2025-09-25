<!DOCTYPE html>
<html lang="en">
  <head>
    
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Home-SportZone</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    
   <style>
      * { 
      box-sizing: border-box; 
      margin:0; padding:0; 
      font-family: 'Segoe UI', sans-serif;
      }
      body { 
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
      margin: 0.1rem;
      }
      @media (max-width: 700px) {
      .content {
      flex-direction: column; 
      align-items: center; 
        }
      }
      header {
      background-color: #004a99;
      color: white;
      padding: 15px 35px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      position: sticky;
      top: 0;
      z-index: 1000;
      transition: all 0.3s ease-in-out;
      }
      .scrolled {
      background-color: #2c94bdff; /* Trendy dark grey (almost black) */
      box-shadow: 0 4px 12px rgba(24, 1, 59, 0.88); /* Deeper shadow for depth */
      padding: 15px 32px;      
      }
      header h1 {
      font-size: 15px;
      font-style: italic;
      }
      nav a {
      margin-left: 20px;
      color: white;
      text-decoration: none;
      font-weight: bold;
      transition: color 0.3s ease;
      }
      nav a:hover {
      color: #ffeb3b;
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
      .dashboard {
      margin-top: 50px;
      padding: px;
      }    
      .sport-zone {
      background-color: #fff;
      border-radius: 12px;
      padding: 20px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
      }
      .sport-zone h2 {
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
      .card:hover {
      transform: scale(1.05);
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
    <header id = "mainHeader">
      <h1>Sport Zone</h1>
        <nav>
          <a href="<?php echo site_url('dashboard'); ?>">Home</a>
          <a href="<?php echo site_url('teams'); ?>">Teams</a>   
          <a href="<?php echo site_url('contact'); ?>">Contact</a>
          <a href="<?php echo site_url('help'); ?>">Help</a>
          <a href="<?php echo site_url('logout'); ?>">Logout</a>
        </nav>
      </header>

       <section class="hero">
          <?php 
          $user = $this->session->userdata('user');
          $firstname = ucfirst(strtolower(htmlspecialchars($user['firstname'])));
          echo "<h2>Welcome, <strong>$firstname</strong></h2>";
          ?>

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
          
            <div class="dashboard">
              <div class="sport-zone">
                <h2>🏟️ Sport Zone</h2>
                  <div class="cards">
                    <div class="card">
                      <h3>Live Match</h3>
                      <p>Team A vs Team B</p>
                      <p>Score: 2 - 1</p>
                    </div>
                    <div class="card">
                      <h3>Upcoming Game</h3>
                      <p>Team C vs Team D</p>
                      <p>Date: Sep 12, 2025</p>
                    </div>
                    <div class="card">
                      <h3>Top Player</h3>
                      <p>Name: John Doe</p>
                      <p>Goals: 12</p>
                  </div>
              </div>
            </div>
         </div>
        </section>

        <footer class="text-center py-4 bg-dark text-light">
          <p>&copy; 2025 SportZone | All Rights Reserved</p>
          <p>Follow us on:</p>
          <div class="social-icons">
            <a href="https://fa cebook.com" target="_blank" class="social-icon"><i class="fab fa-facebook-f"></i> Facebook</a>
            <a href="https://twitter.com" target="_blank" class="social-icon"><i class="fab fa-twitter"></i> Twitter</a>
            <a href="https://instagram.com" target="_blank" class="social-icon"><i class="fab fa-instagram"></i> Instagram</a>
          </div>
        </footer>

         <script>
            window.addEventListener('scroll', function() {
            const header = document.getElementById('mainHeader');
            if (window.scrollY > 0) {
             header.classList.add('scrolled');
             } else {
              header.classList.remove('scrolled');
               }
            });
         </script>
              <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  </body>
</html>
