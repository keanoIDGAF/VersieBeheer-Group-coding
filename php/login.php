<!-- ...................................................... -->
<!-- Name:                       Portfolio List             -->
<!-- Why its made:               This is made for database management -->
<!-- Why this file:              This code is for the user to make a account that is connected to the database -->
<!-- ...................................................... -->
<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "klantonderhoudsystem";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// --- REGISTRATION LOGIC ---
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    $user = $_POST['username'];
    $email = $_POST['email'];
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);

    try {
        $stmt = $conn->prepare("INSERT INTO users (username, password, email, isAdmin) VALUES (:u, :p, :e, 0)");
        $stmt->execute(['u' => $user, 'p' => $pass, 'e' => $email]);
        $success = "Account created successfully! You can now login.";
    }
    catch (PDOException $e) {
        $error = "Registration failed. Username or Email might already exist.";
    }
}

// --- LOGIN LOGIC ---
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = :u");
    $stmt->execute(['u' => $_POST['username']]);
    $user = $stmt->fetch();

    if ($user && (password_verify($_POST['password'], $user['password']) || $_POST['password'] === $user['password'])) {
        $_SESSION['user'] = $user['username'];
        $_SESSION['isAdmin'] = $user['isAdmin'];
        // Redirect to index.php after successful login as requested
        header("Location: index.php");
        exit;
    }
    else {
        $error = "Invalid username or password.";
    }
}

if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio System - Login</title>
    <style>
        :root { 
            --active-tab: #6c5ce7; /* Purple for active tab underline */
            --bg: #fdfdfd; 
            --form-bg: #e0e0e0; /* Gray for form area */
            --input-bg: #ffffff; /* White for inputs */
            --btn-bg: #00ff7f; /* Green for button */
            --nav-bg: #808080; /* Dark gray for nav bar */
        }
        
        body { 
            font-family: 'Arial', sans-serif; 
            background: var(--bg); 
            display: flex; 
            flex-direction: column;
            align-items: center; 
            height: 100vh; 
            margin: 0; 
        }

        /* Top Nav Bar */
        .top-nav {
            width: 100%;
            height: 50px;
            background-color: var(--nav-bg);
            position: relative;
            margin-bottom: 50px; /* Space between nav and form */
        }

        .nav-circle {
            width: 30px;
            height: 30px;
            background-color: #dcdcdc; /* Light gray circle */
            border-radius: 50%;
            position: absolute;
            top: 10px;
            right: 20px;
        }

        /* Form Card */
        .card { 
            width: 100%; 
            max-width: 480px; 
            text-align: center;
        }

        /* Tabs */
        .tabs { 
            display: flex; 
            width: 100%;
            border-bottom: 1px solid #c0c0c0; /* Gray line */
            margin-bottom: 0px; 
        }
        
        .tab-btn { 
            flex: 1; 
            padding: 10px; 
            border: none; 
            background: none; 
            cursor: pointer; 
            font-size: 1rem;
            color: #333; 
            font-weight: normal;
            transition: 0.2s;
            position: relative; /* For the pseudo-element underline */
            padding-bottom: 12px;
        }

        /* Active tab underline */
        .tab-btn.active {
            font-weight: bold;
        }

        .tab-btn.active::after {
            content: '';
            position: absolute;
            bottom: -1px; /* Overlap the bottom border */
            left: 0;
            width: 100%;
            height: 3px;
            background-color: var(--active-tab);
        }
        
        /* Form Area */
        .form-section { 
            display: none; 
            background: var(--form-bg); 
            padding: 30px; 
            border-radius: 12px; 
            /* box-shadow removed for flat look */
        }
        
        .form-section.active { 
            display: block; 
        }
        
        /* Input Styling */
        input { 
            width: 100%; 
            padding: 15px 20px; 
            margin: 10px 0; 
            border: none; 
            border-radius: 25px; /* Fully rounded inputs */
            box-sizing: border-box; 
            background-color: var(--input-bg);
            font-size: 1rem;
        }

        input:focus {
            outline: none;
            box-shadow: 0 0 5px rgba(108, 92, 231, 0.5); /* Subtle focus shadow */
        }

        /* Submit Button Styling */
        input[type="submit"] { 
            background: var(--btn-bg); 
            color: white; 
            border: none; 
            cursor: pointer; 
            font-weight: bold; 
            margin-top: 20px; 
            border-radius: 25px; /* Fully rounded button */
            transition: 0.2s;
            padding: 15px;
            font-size: 1.1rem;
            width: auto; /* Allow content to define width */
            padding-left: 40px;
            padding-right: 40px;
        }
        
        input[type="submit"]:hover { 
            background: #00e676; /* Slightly darker green on hover */
        }
        
        /* Message Styling */
        .msg { 
            padding: 12px; 
            margin-bottom: 15px; 
            border-radius: 6px; 
            font-size: 0.9rem; 
            text-align: center; 
        }
        
        /* Centered Welcome Box */
        .welcome-box { 
            text-align: center; 
            padding: 20px;
        }
    </style>
</head>
<body>

<div class="top-nav">
    <div class="nav-circle"></div>
</div>

<div class="card">
    <?php if (isset($_SESSION['user'])): ?>
        <div class="welcome-box">
            <h1>Hi, <?php echo htmlspecialchars($_SESSION['user']); ?>! 👋</h1>
            <?php if ($_SESSION['isAdmin'] == 1): ?>
                <p style="color: #27ae60;"><strong>Administrator Mode Active</strong></p>
            <?php
    endif; ?>
            <hr>
            <a href="?logout=1" style="color: #e74c3c; text-decoration: none;">Logout of System</a>
        </div>

    <?php
else: ?>
        <?php if (isset($error))
        echo "<div class='msg' style='background:#fee; color:red'>$error</div>"; ?>
        <?php if (isset($success))
        echo "<div class='msg' style='background:#efe; color:green'>$success</div>"; ?>

        <div class="tabs">
            <button class="tab-btn active" onclick="showSection('login-sec', this)">Login</button>
            <button class="tab-btn" onclick="showSection('reg-sec', this)">Register</button>
        </div>

        <div id="login-sec" class="form-section active">
            <form method="post">
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <input type="submit" name="login" value="Sign In">
            </form>
        </div>

        <div id="reg-sec" class="form-section">
            <form method="post">
                <input type="text" name="username" placeholder="Pick a username" required>
                <input type="email" name="email" placeholder="you@example.com" required>
                <input type="password" name="password" placeholder="Create a password" required>
                <input type="submit" name="register" value="Create Account">
            </form>
        </div>
    <?php
endif; ?>
</div>

<script>
    function showSection(sectionId, btn) {
        // Hide all sections
        document.querySelectorAll('.form-section').forEach(sec => sec.classList.remove('active'));
        // Deactivate all buttons
        document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
        
        // Show selected
        document.getElementById(sectionId).classList.add('active');
        btn.classList.add('active');
    }
</script>

</body>
</html>