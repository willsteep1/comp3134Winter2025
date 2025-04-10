<?php
session_start();
$token = bin2hex(random_bytes(16)); 
$_SESSION['confirmation'] = $token;
?>

<!DOCTYPE html>
<html>
<head>
    <title>CSRF Protected Form</title>
</head>
<body>
    <h2>Login (CSRF Protected)</h2>
    <form action="csfr_action.php" method="POST">
        <label>Username:</label>
        <input type="text" name="username" required><br><br>

        <label>Password:</label>
        <input type="password" name="password" required><br><br>

        <!-- CSRF token field -->
        <input type="hidden" name="confirmation" value="<?php echo $token; ?>">

        <button type="submit">Submit</button>
    </form>
</body>
</html>
