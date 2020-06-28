<?php

$id = $_GET['id'];
$hapus = $con->query("DELETE FROM user WHERE id_user = '$id'");
if($hapus)
        {
            echo "
                <script>
                    alert('SUCCESS');
                    window.location='?page=member/member'
                </script>
            ";
        }else{
            echo "
                <script>
                    alert('ERROR');
                    window.location='?page=member/member'
                </script>
            ";
        }