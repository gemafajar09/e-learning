<?php
$id = $_POST['id'];
if(isset($_POST['simpan']))
{
    if($id == NULL)
    {
        $simpan = $con->query("INSERT INTO `buku`(`nama_buku`, `kategori`, `nama_pengarang`, `klasifikasi`, `link`, `tanggal_input`) VALUES ('$_POST[nama_buku]','$_POST[kategori]','$_POST[nama_pengarang]','$_POST[klasifikasi]','$_POST[link]','$_POST[tanggal]')");
        if($simpan)
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
    }else{
        $update = $con->query("UPDATE buku SET nama_buku='$_POST[nama_buku]', kategori='$_POST[kategori]',nama_pengarang='$_POST[nama_pengarang]',klasifikasi='$_POST[klasifikasi]',link='$_POST[link]',tanggal_input='$_POST[tanggal]' WHERE id_buku = '$id'");
        if($update)
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
    }
}