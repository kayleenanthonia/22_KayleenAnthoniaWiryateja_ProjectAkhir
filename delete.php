<?php
//koneksi database
include 'koneksi.php';

//menangkap data id yg dikirim dari url
$id_reservasi = $_GET['id'];

//ambil id_kamar yg direservasi
$query = mysqli_query($koneksi,"select id_kamar from reservasi where id_reservasi='$id_reservasi'");
$data = mysqli_fetch_assoc($query);
$id_kamar = $data['id_kamar'];

//ubah status kamar jd tersedia
mysqli_query($koneksi,"update kamar set status='tersedia' where id_kamar='$id_kamar'");

//menghapus data dari database
mysqli_query($koneksi,"delete from reservasi where id_reservasi='$id_reservasi'");

//mengalihkan hlmn kembali ke index
header("location:tabel.php");

?>