@'
<?php
// หน้าเดโม่ง่ายๆ แค่สะท้อนพารามิเตอร์ id ออกมา
$id = $_GET['id'] ?? '';
header('Content-Type: text/plain; charset=utf-8');
echo "OK id=$id\n";
?>
'@ | Set-Content -Encoding utf8 .\web-server\vuln.php

