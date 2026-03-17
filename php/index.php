<!-- ...................................................... -->
<!-- Name:                       Portfolio List   -->
<!-- Why its made:               This website is made for a school project where we need to make a website that is based on the wireframes and mock-ups we made -->
<!-- Why this file:              This file is made to show the code in this file to be on the screen -->
<!-- ...................................................... -->
<?php
session_start();

// Database Connection
$servername = "localhost"; $username = "root"; $password = ""; $dbname = "prjct";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Security Check
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

// Logout Logic
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Portfolio List</title>
  <style>
    /* RESET & BASIS */
    body { 
      font-family: Arial, sans-serif; 
      margin: 0; 
      padding: 0; 
      background-color: #ffffff; 
      color: #333;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    /* HEADER BALK */
    .top-bar {
      width: 100%;
      height: 75px;
      background-color: #888;
      display: flex;
      justify-content: flex-end; 
      align-items: center;
      padding: 0 30px;
      box-sizing: border-box;
      gap: 15px;
    }

    /* NAVIGATION BUTTONS STYLING */
    .nav-buttons {
      display: flex;
      gap: 12px;
      align-items: center;
    }

    .btn {
      padding: 10px 18px;
      border-radius: 6px;
      text-decoration: none;
      color: white;
      font-weight: 500;
      font-size: 15px;
      border: none;
      cursor: pointer;
      transition: background 0.2s ease;
    }

    .btn-red { background-color: #e74c3c; }
    .btn-red:hover { background-color: #c0392b; }

    .btn-orange { background-color: #f39c12; }
    .btn-orange:hover { background-color: #d35400; }

    .profile-circle {
      width: 42px;
      height: 42px;
      background-color: #ccc;
      border-radius: 50%;
      margin-left: 10px;
    }

    /* CONTENT CONTAINER */
    .container {
      width: 100%;
      max-width: 900px;
      margin-top: 60px;
      padding: 0 40px;
      box-sizing: border-box;
    }

    h1 {
      font-weight: normal;
      font-size: 36px;
      margin-bottom: 40px;
      color: #444;
    }

    hr {
      border: 0;
      border-top: 1px solid #ccc;
      margin: 40px 0;
    }

    .info-text {
      text-align: center;
      font-size: 18px;
      margin: 60px 0;
      color: #666;
    }

    .footer-area {
      display: flex;
      justify-content: center;
      width: 100%;
      margin-top: 40px;
    }

    .login-badge {
      background-color: #d9d9d9;
      padding: 12px 30px;
      border-radius: 20px;
      font-size: 14px;
      color: #333;
    }
  </style>
</head>

<body>

  <header class="top-bar">
    <nav class="nav-buttons">
      <?php if (isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == 1): ?>
        <a href="../crud/admin.php" class="btn btn-orange">Admin Paneel</a>
      <?php endif; ?>

      <a href="?logout=1" class="btn btn-red">Uitloggen</a>
    </nav>
    <div class="profile-circle"></div>
  </header>

  <div class="container">
    <h1>Portfolio List</h1>

    <hr>

    <div class="info-text">
      Information about the website
    </div>

    <div class="footer-area">
      <div class="login-badge">
        alleen te zien als je ingelogd bent
      </div>
    </div>
  </div>

</body>
</html>