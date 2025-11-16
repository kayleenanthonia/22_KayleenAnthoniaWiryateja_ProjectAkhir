<?php
session_start();
include 'koneksi.php';

if(!isset($_SESSION['id_pelanggan'])){
    header("location:login.php");
    exit;
}

//ambil data dari update.php
$id_reservasi = $_POST['id_reservasi'];
$id_kamar_baru = $_POST['id_kamar'];
$check_in = $_POST['check_in'];
$check_out = $_POST['check_out'];
$jmlhorg = $_POST['jmlhorg'];
$catatan = $_POST['catatan'];

//ambil pilihan kamar lama
$querylama = mysqli_query($koneksi, "select id_kamar from reservasi where id_reservasi='$id_reservasi'");
$datalama = mysqli_fetch_assoc($querylama);
$id_kamar_lama = $datalama['id_kamar'];

//cek kalo pilihan kamar baru tersedia
$cek_kamar = mysqli_query($koneksi, "select status, harga from kamar where id_kamar='$id_kamar_baru'");
$datakamar = mysqli_fetch_assoc($cek_kamar);

//kalo ternyata kamar baru tdk tersedia
if($datakamar['status'] == 'dipesan' && $id_kamar_baru!=$id_kamar_lama){
    echo "<script>alert('Sorry, chosen room has already been booked!'); window.history.back();</csript>";
    exit;
}

// hitung hargatot
$harga = $datakamar['harga'];
$hari = (strtotime($check_out) - strtotime($check_in)) / (60*60*24);
$hargatot = $harga * max($hari,1);

// update reservasi
$query = "update reservasi
set id_kamar='$id_kamar_baru',
check_in='$check_in',
check_out='$check_out',
jmlhorg='$jmlhorg',
catatan='$catatan',
hargatot='$hargatot'
where id_reservasi='$id_reservasi'";

// ganti status kamar sblmnya
if(mysqli_query($koneksi,$query)){
    if($id_kamar_baru != $id_kamar_lama){
        mysqli_query($koneksi,"update kamar set status='tersedia' where id_kamar='$id_kamar_lama'");
        mysqli_query($koneksi,"update kamar set status='dipesan' where id_kamar='$id_kamar_baru'");
    }

    echo "<script>alert('Reservation updated successfully!'); window.location='tabel.php';</script>";
} else {
    echo "Failed to update reservation : " .mysqli_error($koneksi);
}?>