<?php

require('../koneksi.php');

if (isset($_POST['login'])) {
    $user = $_POST['user'];
    $password = $_POST['password'];

    // mengecek apakah user login dengan email/username
    $user = filter_var($user, FILTER_VALIDATE_EMAIL);
    if (!$user) {
        // login dengan username
        $pengguna = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$_POST[user]'");
        $array_pengguna = mysqli_fetch_array($pengguna);
        if (password_verify($password, $array_pengguna['password'])) {
            if ($array_pengguna['role'] === 'user') {
                session_start();
                $_SESSION['role'] = 'user';
                $_SESSION['name'] = $array_pengguna['username'];
                header('Location: ../web-user.php');
            } elseif($array_pengguna['role'] === 'admin') {
                session_start();
                $_SESSION['role'] = 'admin';
                $_SESSION['name'] = $array_pengguna['username'];
                header('Location: ../admin/owners/readowners.php');
            }
        } else {
            header('Location: ../auth-view/login.php');
        }
    } else {
         // login dengan email
         $pengguna = mysqli_query($koneksi, "SELECT * FROM users WHERE email='$_POST[user]'");
         $array_pengguna = mysqli_fetch_array($pengguna);
         if (password_verify($password, $array_pengguna['password'])) {
             if ($array_pengguna['role'] === 'user') {
                 session_start();
                 $_SESSION['role'] = 'user';
                 $_SESSION['name'] = $array_pengguna['username'];
                 header('Location: ../web-user.php');
             } elseif($array_pengguna['role'] === 'admin') {
                 session_start();
                 $_SESSION['role'] = 'admin';
                 $_SESSION['name'] = $array_pengguna['username'];
                 header('Location: ../admin/owners/readowners.php');
             }
         } else {
            header('Location: ../auth-view/login.php');
         }
    }
}