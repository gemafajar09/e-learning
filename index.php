<?php
include "koneksi.php";
session_start();
if($_SESSION['id_user'] == NULL)
{
    echo "
    <script>
        alert('Silahkan Login');
        window.location='login.php'
    </script>
";
}
?>
<?php
    $ip = $_SERVER['REMOTE_ADDR'];
    $tanggal = date("Ymd");
    $waktu   = time();   
    $s = $con->query("SELECT * FROM statistik WHERE ip='$ip' AND tanggal='$tanggal'")->fetch_assoc();
         
         if($s == 0){
            $con->query("INSERT INTO statistik(ip, tanggal, hits, online) VALUES('$ip','$tanggal','1','$waktu')");
         }
         else{
            $con->query("UPDATE statistik SET hits=hits+1, online='$waktu' WHERE ip='$ip' AND tanggal='$tanggal'");
         }
?>
<?php include "template/header.php"; ?>
<?php include "template/menu.php"; ?>
 <div class="container-fluid">
<?php
    if (!empty($_GET["page"])) {
        include_once($_GET["page"] . ".php");
    } else {
        include "home.php";
    }
?>
</div>
<?php include "template/footer.php"; ?>