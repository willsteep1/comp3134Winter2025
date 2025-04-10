<?php
$content = file_get_contents("storedxss.txt");
echo "<h2>Stored XSS Demo</h2>";
echo "<div>$content</div>"; 
?>
