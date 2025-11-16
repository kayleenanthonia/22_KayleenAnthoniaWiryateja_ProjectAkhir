<?php 

session_start();
include 'koneksi.php';

if(!isset($_SESSION['id_pelanggan'])){
    header('location:login.php');
    exit;
}

$id_pelanggan = $_SESSION['id_pelanggan'];
$id_kamar = $_POST['id_kamar'];
$check_in = $_POST['check_in'];
$check_out = $_POST['check_out'];
$jmlhorg = $_POST['jmlhorg'];
$catatan = $_POST['catatan'];

//ambil harga kamar
$querykamar = mysqli_query($koneksi,"select harga from kamar where id_kamar='$id_kamar'");
$datakamar = mysqli_fetch_assoc($querykamar);
$harga = $datakamar['harga'];

//hitung total
$hari = (strtotime($check_out) - strtotime($check_in)) / (60*60*24);
$hargatot = $harga * max($hari,1); //minim 1 mlm

//simpan ke tabel reservasi
$query = "insert into reservasi(id_pelanggan,id_kamar,check_in,check_out,jmlhorg,catatan,hargatot)
values('$id_pelanggan','$id_kamar','$check_in','$check_out','$jmlhorg','$catatan','$hargatot')";

//ubah status kamar
if(mysqli_query($koneksi,$query)){
    mysqli_query($koneksi,"update kamar set status='dipesan' where id_kamar='$id_kamar'");
    echo "<script>alert('Reservation success!'); window.location='tabel.php';</script>";
} else{
    echo "Gagal melakukan reservasi: ".mysqli_error($koneksi);
}
?>