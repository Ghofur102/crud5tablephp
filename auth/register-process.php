<?php 

require('../koneksi.php');

session_start();
if (isset($_SESSION['role'])) {
    header('Location: .../web-user.php');
}

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $cek_email = mysqli_query($koneksi, "SELECT * FROM users WHERE email='$email'");
    $cek_username = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$username'");
    $arr_cek1 = mysqli_fetch_array($cek_email);
    $arr_cek2 = mysqli_fetch_array($cek_username);
    if ($arr_cek1 > 0 && $arr_cek2 > 0) {
        # code...
        header('Location: ../auth-view/register.php');
    }

    $sql_register = "INSERT INTO users (username, email, password) VALUE ('$username', '$email', '$password')";
    $register = mysqli_query($koneksi, $sql_register);

    if ($register) {
        session_start();
        $_SESSION['name'] = $username;
        $_SESSION['role'] = 'user';
        header("Location: ../web-user.php");
    }
} 


?>