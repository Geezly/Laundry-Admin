<?php
include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

// Hash password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Simpan ke database
$query = "INSERT INTO admin (username, password) VALUES (?, ?)";
$stmt = $koneksi->prepare($query);
$stmt->bind_param("ss", $username, $hashed_password);

if ($stmt->execute()) {
    echo "Registrasi berhasil!";
} else {
    echo "Gagal registrasi: " . $stmt->error;
}
?>
