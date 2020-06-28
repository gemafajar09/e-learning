<?php
include "koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];
$nama = $_POST['nama'];
$level = $_POST['level'];
$pwd = password_hash($password,PASSWORD_DEFAULT);
$cek = $con->query("SELECT * FROM user WHERE username = '$username'")->fetch_assoc();
if($cek == NULL)
{
    $data = $con->query("INSERT INTO `user`(`username`, `password`, `nama`, `level`) VALUES ('$username','$pwd','$nama','$level')");
    echo "
        <script>
            alert('Silahkan Login');
            window.location='login.php'
        </script>
    ";
}else{
    echo "
        <script>
            alert('Maaf Username Telah Ada');
            window.location='register.php'
        </script>
    ";
}