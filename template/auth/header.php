<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login dengan Tema Hewan Peliharaan</title>
    <!-- Tambahkan link CSS Tailwind di sini -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<?php 

session_start();
if (isset($_SESSION['role'])) {
    header('Location: ../web-user.php');
}

?>
