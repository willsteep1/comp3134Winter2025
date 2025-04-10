<?php

$message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"] ?? '';
    $password = $_POST["password"] ?? '';

    
    if ($username === "host" && $password === "pass") {
        $message = "<div style='color: green;'>✅ Login successful!</div>";
    } else {
        $message = "<div style='color: red;'>❌ Login failed. Invalid credentials.</div>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>CSFR Page</title>
</head>
<body>
    <h2>Login Form</h2>
    <form method="POST" action="csfr.php">
        <label>Username:</label>
        <input type="text" name="username" required><br><br>

        <label>Password:</label>
        <input type="password" name="password" required><br><br>

        <button type="submit">Submit</button>
    </form>

    <?php
    
    if (!empty($message)) 
        echo "<div id='splash-message'>$message</div>";
    }
    ?>
</body>
</html>
