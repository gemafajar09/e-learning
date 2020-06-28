<?php

$id = $_GET['id'];
$hapus = $con->query("DELETE FROM buku WHERE id_buku = '$id'");
if($hapus)
        {
            echo "
                <script>
                    alert('SUCCESS');
                    window.location='?page=buku/buku'
                </script>
            ";
        }else{
            echo "
                <script>
                    alert('ERROR');
                    window.location='?page=buku/buku'
                </script>
            ";
        }