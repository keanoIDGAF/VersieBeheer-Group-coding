<?php
// 1. Database verbinding instellen
$host = 'localhost';
$db   = 'prjct'; // Change this to your database name
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

// 2. Haal de huidige gegevens op uit de database (we pakken hier het laatste profiel als voorbeeld)
$stmt = $pdo->query("SELECT * FROM profiles ORDER BY id DESC LIMIT 1");
$current_data = $stmt->fetch();

// Als er geen data is, maken we een lege array om errors te voorkomen
if (!$current_data) {
    $current_data = array_fill_keys(['fname', 'lname', 'email', 'phone', 'foto', 'aboutme', 'skills', 'language', 'education', 'school', 'company', 'job_title', 'period', 'description', 'linkedin', 'github', 'portfolio'], '');
}
?>

<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profiel Bewerken</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 40px; }
        .form-container { background: white; max-width: 600px; margin: 0 auto; padding: 30px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); }
        h2 { border-bottom: 2px solid #00d2d3; padding-bottom: 10px; margin-top: 30px; color: #333; }
        label { display: block; margin-top: 15px; font-weight: bold; color: #555; }
        input[type="text"], input[type="email"], textarea { 
            width: 100%; padding: 10px; margin-top: 5px; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box; 
        }
        textarea { height: 80px; resize: vertical; }
        button { 
            background-color: #00d2d3; color: white; border: none; padding: 15px 25px; 
            border-radius: 5px; cursor: pointer; font-size: 16px; margin-top: 30px; width: 100%;
        }
        button:hover { background-color: #00b8b9; }
        .back-link { display: block; text-align: center; margin-top: 20px; color: #888; text-decoration: none; }
    </style>
</head>
<body>

<div class="form-container">
    <h1>Bewerk je Profiel</h1>
    
    <form action="profile.php" method="POST">
        
        <h2>Persoonlijke Gegevens</h2>
        <label for="fname">Voornaam:</label>
        <input type="text" id="fname" name="fname" value="<?php echo htmlspecialchars($current_data['fname']); ?>">

        <label for="lname">Achternaam:</label>
        <input type="text" id="lname" name="lname" value="<?php echo htmlspecialchars($current_data['lname']); ?>">

        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($current_data['email']); ?>">

        <label for="phone">Telefoonnummer:</label>
        <input type="text" id="phone" name="phone" value="<?php echo htmlspecialchars($current_data['phone']); ?>">

        <label for="foto">Profielfoto URL:</label>
        <input type="text" id="foto" name="foto" value="<?php echo htmlspecialchars($current_data['foto']); ?>">

        <h2>Profiel Informatie</h2>
        <label for="aboutme">Over mij:</label>
        <textarea id="aboutme" name="aboutme"><?php echo htmlspecialchars($current_data['aboutme']); ?></textarea>

        <label for="skills">Vaardigheden:</label>
        <textarea id="skills" name="skills"><?php echo htmlspecialchars($current_data['skills']); ?></textarea>

        <label for="language">Talen:</label>
        <textarea id="language" name="language"><?php echo htmlspecialchars($current_data['language']); ?></textarea>

        <h2>Opleiding</h2>
        <label for="education">Opleiding:</label>
        <input type="text" id="education" name="education" value="<?php echo htmlspecialchars($current_data['education']); ?>">

        <label for="school">School / Instelling:</label>
        <input type="text" id="school" name="school" value="<?php echo htmlspecialchars($current_data['school']); ?>">

        <h2>Werkervaring</h2>
        <label for="company">Bedrijf:</label>
        <input type="text" id="company" name="company" value="<?php echo htmlspecialchars($current_data['company']); ?>">

        <label for="job_title">Functie:</label>
        <input type="text" id="job_title" name="job_title" value="<?php echo htmlspecialchars($current_data['job_title']); ?>">

        <label for="period">Periode:</label>
        <input type="text" id="period" name="period" value="<?php echo htmlspecialchars($current_data['period']); ?>">

        <label for="description">Beschrijving:</label>
        <textarea id="description" name="description"><?php echo htmlspecialchars($current_data['description']); ?></textarea>

        <h2>Links</h2>
        <label for="linkedin">LinkedIn:</label>
        <input type="text" id="linkedin" name="linkedin" value="<?php echo htmlspecialchars($current_data['linkedin']); ?>">

        <label for="github">GitHub:</label>
        <input type="text" id="github" name="github" value="<?php echo htmlspecialchars($current_data['github']); ?>">

        <label for="portfolio">Portfolio website:</label>
        <input type="text" id="portfolio" name="portfolio" value="<?php echo htmlspecialchars($current_data['portfolio']); ?>">

        <button type="submit">Profiel Opslaan</button>
    </form>
    
    <a href="profile.php" class="back-link">Annuleren en terug naar profiel</a>
</div>

</body>
</html>
