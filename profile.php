<?php
// 1. Database configuratie
$host = 'localhost';
$db   = 'prjct'; // Zorg dat dit overeenkomt met je database naam
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
     $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
     throw new \PDOException($e->getMessage(), (int)$e->code);
}

// 2. Haal de ID uit de URL (bijv. view-profile.php?id=1)
$profileId = $_GET['id'] ?? null;
$profile = null;

if ($profileId) {
    // Zoek de specifieke gebruiker in de database
    $stmt = $pdo->prepare("SELECT * FROM profiles WHERE id = ?");
    $stmt->execute([$profileId]);
    $profile = $stmt->fetch();
}

// 3. Als het profiel niet gevonden is, stop en toon een melding
if (!$profile) {
    die("<h1>Profiel niet gevonden.</h1><p><a href='index.php'>Terug naar overzicht</a></p>");
}

// 4. Zet de database gegevens in variabelen voor de HTML
$fname       = $profile['fname'];
$lname       = $profile['lname'];
$email       = $profile['email'];
$phone       = $profile['phone'];
$foto        = $profile['foto'];
$aboutme     = $profile['aboutme'];
$skills      = $profile['skills'];
$language    = $profile['language'];
$education   = $profile['education'];
$school      = $profile['school'];
$company     = $profile['company'];
$job_title   = $profile['job_title'];
$period      = $profile['period'];
$description = $profile['description'];
$linkedin    = $profile['linkedin'];
$github      = $profile['github'];
$portfolio   = $profile['portfolio'];
?>

<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profiel van <?php echo htmlspecialchars($fname); ?></title>
    <style>
        /* CSS Reset */
        * { box-sizing: border-box; margin: 0; padding: 0; font-family: Arial, sans-serif; }

        body {
            background-color: #333;
            padding: 40px 20px;
            display: flex;
            justify-content: center;
        }

        .window {
            background: linear-gradient(180deg, #f3d4ff 0%, #ffffff 40%);
            width: 100%;
            max-width: 800px;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.5);
        }

        .window-header {
            background-color: #e0e0e0;
            padding: 10px 15px;
            display: flex;
            gap: 8px;
        }

        .dot { width: 12px; height: 12px; border-radius: 50%; }
        .dot.red { background-color: #ff5f56; }
        .dot.yellow { background-color: #ffbd2e; }
        .dot.green { background-color: #27c93f; }

        .content { padding: 20px 40px 60px 40px; }

        .nav-container { text-align: center; margin-bottom: 40px; }

        .nav-btn {
            display: inline-block;
            background-color: #00d2d3;
            color: white;
            text-decoration: none;
            padding: 8px 20px;
            border-radius: 8px;
            font-weight: bold;
            font-size: 16px;
            margin: 0 5px;
        }

        .profile-name { text-align: center; font-size: 28px; color: #222; margin-bottom: 30px; }
        .divider { border: none; border-top: 1px solid #999; width: 80%; margin: 0 auto 40px auto; }
        .section-title { font-size: 22px; margin-bottom: 15px; color: #222; }

        .content-box {
            background-color: #a4a4a4;
            color: white;
            padding: 30px;
            border-radius: 15px;
            margin-bottom: 30px;
            line-height: 1.6;
        }
        
        .center-text { text-align: center; font-size: 18px; }
        .detail-row { margin-bottom: 10px; }
        .detail-row strong { display: inline-block; width: 150px; }
        
        .profile-img {
            display: block;
            margin: 0 auto 20px auto;
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            border: 5px solid white;
        }
    </style>
</head>
<body>

    <div class="window">
        <div class="window-header">
            <div class="dot red"></div>
            <div class="dot yellow"></div>
            <div class="dot green"></div>
        </div>

        <div class="content">
            <div class="nav-container">
                <a href="index.php" class="nav-btn">Terug naar Overzicht</a>
            </div>

            <?php if(!empty($foto)): ?>
                <img src="<?php echo htmlspecialchars($foto); ?>" alt="Profielfoto" class="profile-img">
            <?php endif; ?>

            <h1 class="profile-name">
                <?php echo htmlspecialchars($fname . ' ' . $lname); ?>
            </h1>

            <hr class="divider">

            <h2 class="section-title">About Me</h2>
            <div class="content-box center-text">
                <?php echo nl2br(htmlspecialchars($aboutme)); ?>
            </div>

            <h2 class="section-title">Persoonlijke Gegevens</h2>
            <div class="content-box">
                <div class="detail-row"><strong>E-mail:</strong> <?php echo htmlspecialchars($email); ?></div>
                <div class="detail-row"><strong>Telefoon:</strong> <?php echo htmlspecialchars($phone); ?></div>
                <div class="detail-row"><strong>Vaardigheden:</strong> <?php echo htmlspecialchars($skills); ?></div>
                <div class="detail-row"><strong>Talen:</strong> <?php echo htmlspecialchars($language); ?></div>
            </div>

            <h2 class="section-title">Opleiding</h2>
            <div class="content-box">
                <div class="detail-row"><strong>Opleiding:</strong> <?php echo htmlspecialchars($education); ?></div>
                <div class="detail-row"><strong>School:</strong> <?php echo htmlspecialchars($school); ?></div>
            </div>

            <h2 class="section-title">Werkervaring</h2>
            <div class="content-box">
                <div class="detail-row"><strong>Bedrijf:</strong> <?php echo htmlspecialchars($company); ?></div>
                <div class="detail-row"><strong>Functie:</strong> <?php echo htmlspecialchars($job_title); ?></div>
                <div class="detail-row"><strong>Periode:</strong> <?php echo htmlspecialchars($period); ?></div>
                <div class="detail-row"><strong>Beschrijving:</strong> <?php echo nl2br(htmlspecialchars($description)); ?></div>
            </div>

            <h2 class="section-title">Links</h2>
            <div class="content-box">
                <div class="detail-row"><strong>LinkedIn:</strong> <a href="<?php echo htmlspecialchars($linkedin); ?>" style="color: lightblue;">Bezoek</a></div>
                <div class="detail-row"><strong>GitHub:</strong> <a href="<?php echo htmlspecialchars($github); ?>" style="color: lightblue;">Bezoek</a></div>
                <div class="detail-row"><strong>Portfolio:</strong> <a href="<?php echo htmlspecialchars($portfolio); ?>" style="color: lightblue;">Bezoek</a></div>
            </div>
        </div>
    </div>

</body>
</html>