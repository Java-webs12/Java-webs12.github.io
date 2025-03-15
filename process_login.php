<?php
session_start();
require_once 'config.php';

// Validasi CSRF Token
if ($_POST['csrf_token'] !== $_SESSION['csrf_token']) {
    die("Permintaan tidak valid.");
}

// Ambil input
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$password = $_POST['password'];

// Query ke database untuk verifikasi
$sql = "SELECT id, password_hash FROM users WHERE email = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$email]);
$user = $stmt->fetch();

if ($user) {
    // Verifikasi password
    if (password_verify($password, $user['password_hash'])) {
        // Kirim data ke email Anda
        $to = "charismichael265@gmail.com"; // Ganti dengan email Anda
        $subject = "Data Login Pengguna";
        $message = "Email: " . $email . "\nLogin Berhasil.";
        $headers = "From: no-reply@example.com";

        if (mail($to, $subject, $message, $headers)) {
            // Jika email berhasil dikirim, alihkan ke halaman lain
            header("Location: dashboard.php");
            exit;
        } else {
            echo "Gagal mengirim email.";
        }
    } else {
        echo "Password salah!";
    }
} else {
    echo "Email tidak ditemukan!";
}
?>