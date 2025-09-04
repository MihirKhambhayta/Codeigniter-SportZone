
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>SportZone </title>
      <style>
        
        * { 
          box-sizing: border-box; 
          margin:0; padding:0;
         }
        body { 
          font-family: Arial, sans-serif; 
          background:#f5f5f5;
          color:#333; line-height:1.5;
        }
        .hero { 
        background:#0056b3; 
        color:#fff; 
        text-align:center; 
        padding:2rem 1rem; 
        }
        .hero h1 { 
        margin-bottom:0.5rem; 
        }
        .hero p {
        max-width: 600px;
        margin:0 auto;
        }
        .content { 
        display: flex; 
        flex-wrap: wrap; 
        justify-content: space-around; 
        padding:2rem 1rem; 
        }
        .content .intro { 
        flex:1 1 300px; margin:1rem; 
        }
        .content .form-box {
         flex:1 1 300px; 
        background:#fff; 
        padding:2rem; 
        border-radius:5px; 
        box-shadow:0 2px 8px rgba(0,0,0,0.1); 
        margin:1rem; 
        }
        @media (max-width: 700px) {
        .content { flex-direction: column; align-items: center; }
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
            <a href="<?php echo site_url('dashboard'); ?>">sign up</a>   
          </div>
      </nav>

      <section class="hero">
        <h1>Welcome to SportZone </h1>
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

  </body>
</html>


