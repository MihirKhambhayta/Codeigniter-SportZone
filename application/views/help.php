

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Help - SportZone</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            body {
                font-family: Arial, sans-serif;
                background: #f5f5f5;
                color: #333;
                line-height: 1.5;
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
            .hero {
                background: #0056b3;
                color: #fff;
                text-align: center;
                padding: 3rem 1rem;
            }
            .hero h1 {
                margin-bottom: 1rem;
            }
            .content {
                padding: 3rem 1rem;
            }
            .faq-list {
                list-style-type: none;
                padding: 0;
            }
            .faq-list li {
                margin-bottom: 1rem;
            }
            .contact-form {
                background: #fff;
                padding: 2rem;
                box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
                border-radius: 5px;
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
            .social-icon:hover  {
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
                <a href="<?php echo site_url('dashboard'); ?>">Home</a>
            <a href="<?php echo site_url('teams'); ?>">Teams</a>
            <a href="<?php echo site_url('contact'); ?>">Contact</a>
            <a href="<?php echo site_url('help'); ?>">Help</a>
            <a href="<?php echo site_url('logout'); ?>">Logout</a>
            </div>
        </nav>

        <section class="hero">
            <h1>Need Help?</h1>
            <p>Your one-stop destination for all the assistance you need with SportZone.</p>
        </section>


        <section class="content container">
            
            <div class="faqs">
                <h2>Frequently Asked Questions (FAQs)</h2>
                <ul class="faq-list">
                    <li><strong>How do I place a bet?</strong><br>Simply log in, select your sport, and choose a game or event you wish to bet on. Then, enter your stake and place your bet.</li>
                    <li><strong>What payment methods are available?</strong><br>We accept credit/debit cards, PayPal, and bank transfers for deposits and withdrawals.</li>
                    <li><strong>How do I withdraw my winnings?</strong><br>Go to your account settings and select the withdrawal option. Follow the prompts to withdraw funds.</li>
                    <li><strong>Can I use SportZone on my mobile device?</strong><br>Yes, SportZone is fully optimized for mobile use. You can access all features from your smartphone or tablet.</li>
                    <li><strong>Is SportZone available in my country?</strong><br>We are available in many countries worldwide. Please check our list of supported countries on our website.</li>
                </ul>
            </div>
        </section>

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
    </body>
</html>
