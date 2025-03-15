<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "charismichael265@gmail.com"; // Ganti dengan email Anda
    $subject = "Data Formulir";
    $message = "Nama: " . $_POST['name'] . "\n" .
               "Email: " . $_POST['email'] . "\n" .
               "Pesan: " . $_POST['message'];
    $headers = "From: no-reply@example.com";

    if (mail($to, $subject, $message, $headers)) {
        echo "Email berhasil dikirim!";
    } else {
        echo "Gagal mengirim email.";
    }
}
?>