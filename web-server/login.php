
<?php
// Very intentionally vulnerable code for demo purposes ONLY.
// Uses SQLite and constructs SQL unsafely to demonstrate SQL Injection.
$dbfile = '/var/www/html/demo.db';
$db = new PDO('sqlite:' . $dbfile);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Create table and insert a user if not exists
$db->exec("CREATE TABLE IF NOT EXISTS users (id INTEGER PRIMARY KEY, username TEXT, password TEXT);"); 
$db->exec("INSERT OR IGNORE INTO users (id, username, password) VALUES (1, 'admin', 'secret');");

$username = isset($_GET['username']) ? $_GET['username'] : '';
$password = isset($_GET['password']) ? $_GET['password'] : '';

// Intentionally vulnerable query (DO NOT use in production)
$query = "SELECT * FROM users WHERE username = '$username' AND password = '$password' LIMIT 1;";
$rows = $db->query($query);

echo "<h3>Executed Query:</h3><pre>" . htmlspecialchars($query) . "</pre>";

if ($rows && $rows->fetch()) {
    echo "<p style='color:green;'>Login successful for user: " . htmlspecialchars($username) . "</p>";
} else {
    echo "<p style='color:red;'>Login failed</p>";
}
?>