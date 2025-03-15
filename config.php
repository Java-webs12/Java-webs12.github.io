<?php
// Konfigurasi koneksi ke database
$dsn = 'mysql:host=localhost;dbname=secure_login';
$username = 'root';
$password = '';
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

$pdo = new PDO($dsn, $username, $password, $options);

// CSRF Token
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

$csrf_token = $_SESSION['csrf_token'];