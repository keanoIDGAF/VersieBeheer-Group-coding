<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="sidebar">
        <h2 class="logo">CVHub</h2>
        <a href="dashboard.php">Dashboard</a>
        <a href="profile.php">Profielen</a>
        <a href="edit-profile.php">Profiel bewerken</a>
        <a href="index.php">Main page</a>
        <a href="logout.php">Uitloggen</a>
    </div>
    <div class="main-content">
        <div class="top-bar">
            <div>
                <h1>Dashboard</h1>
                <p>Overzicht van gebruikers en profielen</p>
            </div>
            <a class="btn" href="edit-profile.php">Nieuwe gebruiker toevoegen</a>
        </div>

        <div class="cards">
            <div class="card stat-card">
                <h3>Totaal gebruikers</h3>
                <p class="stat-number"><?= $totalUsers ?? 0 ?></p>
            </div>
            <div class="card stat-card">
                <h3>Profielen compleet</h3>
                <p class="stat-number"><?= $completeProfiles ?? 0 ?></p>
            </div>
            <div class="card stat-card">
                <h3>Profielen onvolledig</h3>
                <p class="stat-number"><?= $incompleteProfiles ?? 0 ?></p>
            </div>
</div>

        <div class="table-box">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Voornaam</th>
                        <th>Achternaam</th>
                        <th>E-mail</th>
                        <th>Rol</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?= $user["id"] ?></td>
                            <td><?= $user["first_name"] ?? "" ?></td>
                            <td><?= $user["last_name"] ?? "" ?></td>
                            <td><?= $user["email"] ?></td>
                            <td><?= $user["role"] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>



