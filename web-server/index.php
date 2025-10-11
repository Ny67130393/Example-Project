
<?php
header('Content-Type: text/html; charset=utf-8');
?>
<!doctype html>
<html>
<head><title>Demo Login (Vulnerable)</title></head>
<body>
<h2>Login</h2>
<form method="GET" action="login.php">
  Username: <input name="username"><br>
  Password: <input name="password"><br>
  <button type="submit">Login</button>
</form>
<p>Try SQL Injection: username=admin' -- </p>
</body>
</html>
