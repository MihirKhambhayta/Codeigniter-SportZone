
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sport Zone | Home</title>
    <style>
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Segoe UI', sans-serif;
        }

      body {
        background: #f4f4f4;
        color: #333;
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

      header h1 {
        font-size: 15px;
        font-style: italic; 
      }
      .scrolled {
        background-color: #2c94bdff; /* Trendy dark grey (almost black) */
        box-shadow: 0 4px 12px rgba(24, 1, 59, 0.88); /* Deeper shadow for depth */
        padding: 15px 32px;
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
      .hero {
        background: url('https://images.unsplash.com/photo-1599059812828-bd5c98b7cbb9') no-repeat center center/cover;
        height: 90vh;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: white;
        position: relative;
      }

      .hero::after {
        content: "";
        position: absolute;
        top: 0; left: 0;
        width: 100%; height: 100%;
        background-color: rgba(0,0,0,0.5);
      }

      .hero-content {
        position: relative;
        z-index: 1;
        max-width: 600px;
      }

      .hero h2 {
        font-size: 48px;
        margin-bottom: 20px;
      }

      .hero p {
        font-size: 18px;
        margin-bottom: 30px;
      }

      .hero a.button {
        background-color: #ff9800;
        color: white;
        padding: 12px 25px;
        border: none;
        border-radius: 25px;
        font-size: 16px;
        text-decoration: none;
        transition: background-color 0.3s ease;
      }

      .hero a.button:hover {
        background-color: #fb8c00;
      }

      .features {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
        margin: 40px 20px;
        gap: 30px;
      }

      .feature-box {
        background: white;
        padding: 25px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
        flex: 1;
        min-width: 280px;
        text-align: center;
      }

      .feature-box h3 {
        color: #1e88e5;
        margin-bottom: 15px;
      }

      .feature-box p {
        color: #666;
      }

      footer {
        background: #333;
        color: #ccc;
        text-align: center;
        padding: 20px;
        margin-top: 40px;
      }
    </style>
  </head>
  <body>

    <!-- Header -->
    <header id="mainHeader">
      <h1>Sport Zone</h1>
      <nav>
        <a href="<?php echo site_url('login'); ?>">sign up</a> 
      </nav>
    </header>

      <!-- Adnin side logout -->
      <?php if (!empty($logout_by_admin)): ?>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script>
          Swal.fire({
              icon: 'info',
              title: 'You\'ve Been Logged Out',
              text: 'You were logged out by the administrator.',
              confirmButtonText: 'OK'
              }).then(() => {
            window.location.href = '<?= site_url("login") ?>'; // Or wherever you want
          });
      </script>
      <?php endif; ?>



    <!-- Hero Section -->
    <section class="hero">
      <div class="hero-content">
        <h2>Unleash the Athlete in You</h2>
        <p>Get premium sports gear and accessories for every sport, every goal, every athlete.</p>
        <a href="#" class="button">Shop Now</a>
      </div>
    </section>

    <!-- Features Section -->
   <section class="features">
      <div class="feature-box">
        <h3>Top Brands</h3>
        <p>We stock all major sports brands including Nike, Adidas, Puma, and more.</p>
      </div>

      <div class="feature-box">
        <h3>Fast Delivery</h3>
        <p>Get your gear delivered at lightning speed, anywhere in the country.</p>
      </div>

      <div class="feature-box">
        <h3>Expert Advice</h3>
        <p>Need help choosing? Our sports specialists are here to guide you.</p>
      </div>
   </section>
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

    <!-- Footer -->
    <footer>
      &copy; <?= date('Y') ?> Sport Zone. All Rights Reserved.
    </footer>

  </body>
</html>
