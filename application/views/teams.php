<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Teams - SportZone</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            body {
                font-family: 'Segoe UI', sans-serif;
                background-color: #f4f4f4;
            }
            .hero {
                background: url('assets/images/banner.jpg') center/cover no-repeat;
                padding: 60px 20px;
                text-align: center;
                color: white;
            }
            .hero h1 {
                font-size: 3em;
                margin: 0;
            }
            .team-container {
                margin-top: 40px;
                display: flex;
                flex-wrap: wrap;
                justify-content: space-around;
            }
            .team-card {
                background-color: #fff;
                border-radius: 10px;
                width: 30%;
                margin: 20px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            }
            .team-card img {
                width: 100%;
                height: 200px;
                border-top-left-radius: 10px;
                border-top-right-radius: 10px;
                object-fit: cover;
            }
            .team-card-body {
                padding: 20px;
                text-align: center;
            }
            .team-card-body h5 {
                color: #333;
            }
            .team-card-body p {
                color: #777;
                font-size: 1em;
            }
            .btn {
                background-color: #4CAF50;
                color: white;
                padding: 10px 20px;
                border-radius: 5px;
                text-decoration: none;
            }
            .btn:hover {
                background-color: #45a049;
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
                background-color: #343a40; /* Dark background */
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
                color: #4CAF50; /* Green color on hover */
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
                <a href="<?php echo site_url('dashboard'); ?>">Home</a>
                <a href="<?php echo site_url('teams'); ?>">Teams</a>
                <a href="<?php echo site_url('contact'); ?>">Contact</a>
                <a href="<?php echo site_url('help'); ?>">Help</a>
                <a href="<?php echo site_url('logout'); ?>">Logout</a>
            </div>
         </nav>

    
        <div class="hero">
            <h1>Meet Our Teams</h1>
            <p>Explore the best teams in SportZone</p>
        </div>
            
        <div class="container team-container">
            <div class="team-card">
                <img src="assets/images/team1.webp" alt="Team A">
                
                <div class="team-card-body">
                    <h5>Team A</h5>
                    <p>Sports: Cricket </p>
                    <p>Location: India</p>
                    <a href="#" class="btn">Learn More</a>
                </div>
            </div>

            <div class="team-card">
                <img src="assets/images/team2.jpg" alt="Team B">
                <div class="team-card-body">
                    <h5>Team B</h5>
                    <p>Sports: Tennis, Volleyball</p>
                    <p>Location: Los Angeles</p>
                    <a href="#" class="btn">Learn More</a>
                </div>
            </div>

            <div class="team-card">
                <img src="assets/images/team3.webp" alt="Team C">
                <div class="team-card-body">
                    <h5>Team C</h5>
                    <p>Sports: Football, Basketball</p>
                    <p>Location: London</p>
                    <a href="#" class="btn">Learn More</a>
                </div>
            </div>
        </div>

    
          <footer class="text-center py-4 bg-dark text-light">
                 <p>&copy; 2025 SportZone | All Rights Reserved</p>
                 <p>Follow us on:</p>
                <div class="social-icons">
                    <a href="https://facebook.com" target="_blank" class="social-icon">
                        <i class="fab fa-facebook-f"></i> Facebook
                    </a>
                    <a href="https://twitter.com" target="_blank" class="social-icon">
                        <i class="fab fa-twitter"></i> Twitter
                    </a>
                    <a href="https://instagram.com" target="_blank" class="social-icon">
                        <i class="fab fa-instagram"></i> Instagram
                    </a>
                </div>
         </footer>
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>


