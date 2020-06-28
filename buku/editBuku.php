<?php
include "../koneksi.php";
$id = $_POST['id'];

$data = $con->query("SELECT * FROM buku WHERE id_buku = '$id'")->fetch_assoc();
echo json_encode($data);