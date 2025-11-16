<?php
$koneksi = mysqli_connect("localhost","root","mysql","projectakhir");

// echo 'KONEKSI BERHASIL';

if(mysqli_connect_error()){
    echo "Koneksi database gagal : ".mysqli_connect_error();
}

?>