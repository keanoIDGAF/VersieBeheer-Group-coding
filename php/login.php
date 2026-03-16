<!-- ...................................................... -->
<!-- Name:                       Portfolio List             -->
<!-- Why its made:               This is made for database management -->
<!-- Why this file:              This code is for the user to make a account that is connected to the database -->
<!-- ...................................................... -->
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "prjct";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

session_start();
$conn = new PDO("mysql:host=localhost;dbname=prjct", "root", "");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = :u AND password = :p");
    $stmt->execute(['u' => $_POST['username'], 'p' => $_POST['password']]);
    $user = $stmt->fetch();

    if ($user) {
        $_SESSION['user'] = $user['username'];
        header("Location: index.php");
        exit;
    } else {
        $error = "Invalid login.";
    }
}

if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<body>

    <?php if (isset($_SESSION['user'])): ?>
        <h1>Welcome, <?php echo $_SESSION['user']; ?>!</h1>
        <a href="?logout=1">Logout</a>

    <?php else: ?>
        <h1>Login</h1>
        <?php if (isset($error)) echo "<p style='color:red'>$error</p>"; ?>
        <form method="post">
            Username: <input type="text" name="username" required><br><br>
            Password: <input type="password" name="password" required><br><br>
            <input type="submit" name="login" value="Login">
        </form>
    <?php endif; ?>

</body>
</html>