<?php
// Database connection
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

    
    $stmt = $conn->prepare("SELECT * FROM users WHERE firstname = ? AND active = 1");
    $stmt->bind_param("s", $firstname);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $results[] = $row;
        }
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Secure User Query</title>
</head>
<body>
    <h2>Search Active Users by First Name (Secure)</h2>
    <form method="GET" action="getusers_2.php">
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
                    <td><?= htmlspecialchars($row['id']) ?></td>
                    <td><?= htmlspecialchars($row['username']) ?></td>
                    <td><?= htmlspecialchars($row['email']) ?></td>
                    <td><?= htmlspecialchars($row['firstname']) ?></td>
                    <td><?= htmlspecialchars($row['lastname']) ?></td>
                    <td><?= htmlspecialchars($row['active']) ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php elseif (isset($_GET['firstname'])): ?>
        <p>No active users found with that first name.</p>
    <?php endif; ?>

</body>
</html>
