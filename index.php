<!-- ...................................................... -->
<!-- Name:                       Portfolio List   -->
<!-- Why its made:               This website is made for a school project where we need to make a website that is based on the wireframes and mock-ups we made -->
<!-- Why this file:              This file is made to show the code in this file to be on the screen -->
<!-- ...................................................... -->
<?php
session_start();

// Database Connection
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "prjct"; // Changed this to match your previous database name

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Security Check
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

// Fetch all profiles from the database
$stmt = $conn->prepare("SELECT id, fname, lname, job_title, foto FROM profiles ORDER BY id DESC");
$stmt->execute();
$profiles = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
    /* ... (Your existing CSS remains the same) ... */
    body { font-family: Arial, sans-serif; margin: 0; background-color: #f9f9f9; display: flex; flex-direction: column; align-items: center; }
    .top-bar { width: 100%; height: 75px; background-color: #888; display: flex; justify-content: flex-end; align-items: center; padding: 0 30px; box-sizing: border-box; gap: 15px; }
    .btn { padding: 10px 18px; border-radius: 6px; text-decoration: none; color: white; font-weight: 500; cursor: pointer; }
    .btn-red { background-color: #e74c3c; }
    .btn-orange { background-color: #f39c12; }
    
    .container { width: 100%; max-width: 900px; margin-top: 60px; padding: 0 40px; box-sizing: border-box; }
    
    /* NEW STYLES FOR THE LIST */
    .portfolio-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
      gap: 20px;
      margin-top: 30px;
    }

    .portfolio-card {
      background: white;
      border: 1px solid #ddd;
      border-radius: 10px;
      padding: 20px;
      text-align: center;
      transition: transform 0.2s;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    .portfolio-card:hover {
      transform: translateY(-5px);
    }

    .card-img {
      width: 80px;
      height: 80px;
      background-color: #eee;
      border-radius: 50%;
      margin: 0 auto 15px;
      object-fit: cover;
      display: block;
    }

    .card-name { font-size: 20px; color: #333; margin-bottom: 5px; }
    .card-title { font-size: 14px; color: #777; margin-bottom: 15px; }
    
    .view-btn {
      display: inline-block;
      background-color: #00d2d3;
      color: white;
      padding: 8px 15px;
      border-radius: 5px;
      text-decoration: none;
      font-size: 14px;
    }
  </style>
</head>

<body>

  <header class="top-bar">
    <nav class="nav-buttons">
      <?php if (isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == 1): ?>
        <a href="../crud/admin.php" class="btn btn-orange">Admin Paneel</a>
      <?php endif; ?>
      <a href="profile.php" class="btn" style="background: #555;">Mijn Profiel</a>
      <a href="?logout=1" class="btn btn-red">Uitloggen</a>
    </nav>
  </header>

  <div class="container">
    <h1>Portfolio List</h1>
    <hr>

    <div class="portfolio-grid">
      <?php if (count($profiles) > 0): ?>
        <?php foreach ($profiles as $profile): ?>
          <div class="portfolio-card">
            <img src="<?php echo !empty($profile['foto']) ? htmlspecialchars($profile['foto']) : 'https://via.placeholder.com/80'; ?>" alt="Profile" class="card-img">
            
            <div class="card-name">
              <?php echo htmlspecialchars($profile['fname'] . ' ' . $profile['lname']); ?>
            </div>
            
            <div class="card-title">
              <?php echo htmlspecialchars($profile['job_title'] ?? 'Professional'); ?>
            </div>
            
            <a href="profile.php?id=<?php echo $profile['id']; ?>" class="view-btn">Bekijk Profiel</a>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <p class="info-text">Er zijn nog geen portfolio's geüpload.</p>
      <?php endif; ?>
    </div>

  </div>

</body>
</html>