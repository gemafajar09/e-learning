<?php
include "koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];

$cek = $con->query("SELECT * FROM user WHERE username='$username'")->fetch_assoc();
if($cek['username'] == $username)
{
    if(password_verify($password,$cek['password']))
    {
        session_start();
        $_SESSION['id_user'] = $cek['id_user'];
        $_SESSION['nama'] = $cek['nama'];
        $_SESSION['level'] = $cek['level'];
        echo "
            <script>
                alert('Selamat Datang');
                window.location='index.php'
            </script>
        ";
    }else{
        echo "
            <script>
                alert('Maaf Password Salah');
                window.location='login.php'
            </script>
        ";
    }
}else{
    echo "
        <script>
            alert('Maaf Username Salah');
            window.location='login.php'
        </script>
    ";
}