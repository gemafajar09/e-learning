<?php
include "koneksi.php";
$tanggal = date('Y-m-d');
$tgl2 = date('Y-m-d', strtotime('-1 days', strtotime($tanggal)));
$sekarang = $con->query("SELECT count(ip) as ips, sum(hits) as onlinee FROM `statistik` WHERE tanggal='$tanggal'")->fetch_assoc();
$kemarin = $con->query("SELECT sum(hits) as onn FROM `statistik` WHERE tanggal='$tgl2'")->fetch_assoc();

if($kemarin['onn'] == NULL)
{
    $o = 0;
}else{
    $o = $kemarin['onn'];
}
?>
<div class="card">
  <div class="card-body">
    <div class="row" style="text-align: center">
      <div class="col-md-4">
          <i class="fa fa-globe" style="color:grey; font-size:9px">&nbsp;kemarin</i>
          <br><b style="color:black"><?= $o ?></b>
      </div>
      <div class="col-md-4">
        <i class="fa fa-globe" style="color:blue; font-size:9px">&nbsp;Hari Ini</i>
        <br><b style="color:black"><?= $sekarang['onlinee'] ?></b>
      </div>
      <div class="col-md-4">
        <i class="fa fa-globe" style="color:green; font-size:9px">&nbsp;Online</i>
        <br><b style="color:black"><?= $sekarang['ips'] ?></b>
      </div>
    </div>
  </div>
</div>