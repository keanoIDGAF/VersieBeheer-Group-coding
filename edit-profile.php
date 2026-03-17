<?php
?>

<?php
?>

<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profiel Bewerken</title>
</head>
<body>

    <form action="profiel.php" method="POST">
        <h2>Persoonlijke Gegevens</h2>

        <label for="fname">Naam:</label>
        <input type="text" id="fname" name="fname">

        <label for="lname">Achternaam:</label>
        <input type="text" id="lname" name="lname">

        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email">

        <label for="phone">Telefoonnummer:</label>
        <input type="phone" id="phone" name="phone">

        <label for="foto">Profielfoto:</label>
        <input type="text" id="foto" name="foto">

        <h2>Profiel Informatie</h2>

        <label for="aboutme">Over mij:</label>
        <textarea id="aboutme" name="aboutme"></textarea>

        <label for="skills">Vaardigheden:</label>
        <textarea id="skills" name="skills"></textarea>

        <label for="language">Talen:</label>
        <textarea id="language" name="language"></textarea>

        <h2>Opleiding</h2>

        <label for="education">Opleiding:</label>
        <input type="text" id="education" name="education">

        <label for="school">School / Instelling:</label>
        <input type="text" id="school" name="school">


        <h2>Werkervaring</h2>

        <label for="company">Bedrijf:</label>
        <input type="text" id="company" name="company">

        <label for="job_title">Functie:</label>
        <input type="text" id="job_title" name="job_title">

        <label for="period">Periode:</label>
        <input type="text" id="period" name="period">

        <label for="description">beschrijving:</label>
        <textarea id="description" name="description"></textarea>

        <h2>Links</h2>

        <label for="linkedin">LinkedIn:</label>
        <input type="text" id="linkedin" name="linkedin">

        <label for="github">GitHub:</label>
        <input type="text" id="github" name="github">

        <label for="portfolio">Portfolio website:</label>
        <input type="text" id="portfolio" name="portfolio">

        <br><br>
        <button type="submit">Opslaan</button>
    </form>

</body>
</html>





