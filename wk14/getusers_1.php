<?php
// Database credentials
$host = "localhost";
$db = "mydb";
$user = "root";
$pass = "105eb01afb8da7b9c0da5a0b988d599c433d0838b1df4da7";


$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$results = [];
if (isset($_GET['firstname'])) {
    $firstname = $_GET['firstname']; 
    $sql = "SELECT * FROM users WHERE firstname = '$firstname' AND active = 1";
    $query = $conn->query($sql);

    if ($query && $query->num_rows > 0) {
        while ($row = $query->fetch_assoc()) {
            $results[] = $row;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Query Active Users</title>
</head>
<body>
    <h2>Search Active Users by First Name</h2>
    <form method="GET" action="getusers_1.php">
        <input type="text" name="firstname" placeholder="Enter first name" required>
        <button type="submit">Search</button>
    </form>

    <?php if (!empty($results)): ?>
        <h3>Results:</h3>
        <table border="1" cellpadding="8">
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Active</th>
            </tr>
            <?php foreach ($results as $row): ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['username'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td><?= $row['firstname'] ?></td>
                    <td
