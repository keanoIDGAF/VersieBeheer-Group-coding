<?php
$fname = $_POST['fname'] ?? '';
$lname = $_POST['lname'] ?? '';
$email = $_POST['email'] ?? '';
$phone = $_POST['phone'] ?? '';
$foto = $_POST['foto'] ?? '';

$aboutme = $_POST['aboutme'] ?? '';
$skills = $_POST['skills'] ?? '';
$language = $_POST['language'] ?? '';

$education = $_POST['education'] ?? '';
$school = $_POST['school'] ?? '';

$company = $_POST['company'] ?? '';
$job_title = $_POST['job_title'] ?? '';
$period = $_POST['period'] ?? '';
$description = $_POST['description'] ?? '';

$linkedin = $_POST['linkedin'] ?? '';
$github = $_POST['github'] ?? '';
$portfolio = $_POST['portfolio'] ?? '';
?>

<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mijn Profiel</title>
</head>
<body>

    <h1>Mijn Profiel</h1>
    <a href="edit-profile.php" class= button>Profile Bewerken</a>

    <h2>Persoonlijke Gegevens</h2>
    <p><strong>Naam:</strong> <?php echo htmlspecialchars($fname); ?></p>
    <p><strong>Achternaam:</strong> <?php echo htmlspecialchars($lname); ?></p>
    <p><strong>E-mail:</strong> <?php echo htmlspecialchars($email); ?></p>
    <p><strong>Telefoonnummer:</strong> <?php echo htmlspecialchars($phone); ?></p>
    <p><strong>Profielfoto:</strong> <?php echo htmlspecialchars($foto); ?></p>

    <h2>Profiel Informatie</h2>
    <p><strong>Over mij:</strong> <?php echo htmlspecialchars($aboutme); ?></p>
    <p><strong>Vaardigheden:</strong> <?php echo htmlspecialchars($skills); ?></p>
    <p><strong>Talen:</strong> <?php echo htmlspecialchars($language); ?></p>

    <h2>Opleiding</h2>
    <p><strong>Opleiding:</strong> <?php echo htmlspecialchars($education); ?></p>
    <p><strong>School / Instelling:</strong> <?php echo htmlspecialchars($school); ?></p>
    

    <h2>Werkervaring</h2>
    <p><strong>Bedrijf:</strong> <?php echo htmlspecialchars($company); ?></p>
    <p><strong>Functie:</strong> <?php echo htmlspecialchars($job_title); ?></p>
    <p><strong>Periode:</strong> <?php echo htmlspecialchars($period); ?></p>
    <p><strong>Beschrijving:</strong> <?php echo htmlspecialchars($description); ?></p>

    <h2>Links</h2>
    <p><strong>LinkedIn:</strong> <?php echo htmlspecialchars($linkedin); ?></p>
    <p><strong>GitHub:</strong> <?php echo htmlspecialchars($github); ?></p>
    <p><strong>Portfolio website:</strong> <?php echo htmlspecialchars($portfolio); ?></p>

</body>
</html>