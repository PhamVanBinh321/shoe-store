<?php
$host = 'localhost';
$dbname = 'baicuoiky'; // Tên database của bạn
$username = 'root'; // Tên người dùng của bạn
$password = '1234'; // Mật khẩu của bạn

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Could not connect to the database: " . $e->getMessage());
}
?>
