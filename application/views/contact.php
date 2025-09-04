<!DOCTYPE html>
<html lang="en">
    <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Contact Us - SportZone</title>
        
            <style>
                body {
                    font-family: 'Segoe UI', sans-serif;
                    margin: 0;
                    background: #f4f4f4;    
                }
                .hero {
                    background: url('<?php echo base_url("assets/images/banner.jpg"); ?>') center/cover no-repeat;
                    padding: 80px 20px;
                    text-align: center;
                    color: white;
                }
                .hero h1 {
                    font-size: 3em;
                    margin: 0;
                }

                .container {
                    max-width: 800px;
                    margin: 30px auto;
                    background: white;
                    padding: 30px;
                    border-radius: 12px;
                    box-shadow: 0 0 15px rgba(0,0,0,0.1);
                }

                .container h2 {
                    color: #4CAF50;
                    margin-bottom: 20px;
                }

                label {
                    display: block;
                    margin: 10px 0 5px;
                    font-weight: bold;
                }

                input, textarea {
                    width: 100%;
                    padding: 12px;
                    border-radius: 8px;
                    border: 1px solid #ccc;
                    margin-bottom: 15px;
                    font-size: 1em;
                }

                button {
                    background: #4CAF50;
                    color: white;
                    border: none;
                    padding: 14px;
                    font-size: 16px;
                    border-radius: 8px;
                    width: 100%;
                    cursor: pointer;
                }

                .success {
                    color: green;
                    font-weight: bold;
                }
                .error {
                    color: red;
                    font-weight: bold;
                }

                .contact-info {
                    margin-top: 30px;
                    background: #eee;
                    padding: 20px;
                    border-radius: 8px;
                }

                .map {
                    margin-top: 20px;
                }

                @media (max-width: 600px) {
                    .hero h1 { font-size: 2em; }
                    .container { margin: 20px; }
                }

                .navbar {
                    background-color: #004a99;
                    color: white;
                    padding: 20px 40px;
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                }

                .navbar a {
                    color:#fff;
                    margin-left:1rem;
                    text-decoration:none;
                    font-weight: bold;
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
                        <h1>Contact SportZone</h1>
                        <p>Your connection to everything sports</p>
                </div>

                <div class="container">
                     <h2>Contact Support Form</h2>
                     <div id="responseMessage"></div>

                    <form id="contactForm">
                            <label for="name">Name:</label>
                            <input type="text" name="name" id="name" required>

                            <label for="email">Email:</label>
                            <input type="email" name="email" id="email" required>

                            <label for="message">Message:</label>
                            <textarea name="message" id="message" rows="6" required></textarea>

                            <button type="submit">Send Message</button>
                     </form>

                    <div class="contact-info">
                        <h3>SportZone HQ</h3>
                        <p><strong>Email:</strong> support@sportzone.com</p>
                        <p><strong>Phone:</strong> +91 9990445265-SPORT</p>
                        <p><strong>Location:</strong> Stadium Road Motera, Sabarmati, Ahmedabad, Gujarat 380005</p>
                    </div>

                    <div class="map">
                        <!-- Google Map iframe -->
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1893942.8497960437!2d71.19395409563452!3d22.00720586519718!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e83c17dc37ee3%3A0xab976f6a3a1f932d!2sNarendra%20Modi%20Stadium!5e0!3m2!1sen!2sin!4v1756104590402!5m2!1sen!2sin" 
                            width="100%" 
                            height="300" 
                            style="border:0;" 
                            allowfullscreen="" 
                            loading="lazy">
                        </iframe>
                    </div>
                </div>

        <script>
            
            document.getElementById('contactForm').addEventListener('submit', function(event) 
            {
                event.preventDefault();

                var formData = new FormData(this);

                var xhr = new XMLHttpRequest();
                xhr.open("POST", "<?php echo site_url('contact/submit'); ?>", true);
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === 4 && xhr.status === 200) 
                    {
                        var response = xhr.responseText.trim();

                        if (response === 'success') 
                        {
                            document.getElementById('responseMessage').innerHTML = '<p class="success">Your message has been sent successfully! We\'ll get back to you soon.</p>';
                            document.getElementById('contactForm').reset();
                        } else 
                        {
                            document.getElementById('responseMessage').innerHTML = '<p class="error">There was an issue sending your message. Please try again later.</p>';
                        }
                    }
                };
                xhr.send(formData);
                
            });
        </script>

    </body>
</html>
