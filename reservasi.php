<?php

session_start();
include 'koneksi.php';

//user udh login
if(!isset($_SESSION['id_pelanggan'])){
    header("location: login.php");
    exit;
}

//ambil daftar kamar
$query = "select * from kamar where status='tersedia'";
$result = mysqli_query($koneksi,$query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Reservation</title>
    <link rel="icon" href="logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link href='reservasi_style.css' rel='stylesheet'/>
</head>
<body style="background-image: url(bglogin.jpg); background-size: cover; background-position: center center; background-repeat: no-repeat; background-attachment: fixed; font-family: 'Times New Roman', Times, serif;">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <div class='badan'>
        <div class='badan1'>
                <nav class='navlink'>
                    <div class='navleft'>
                        <h2 class='sitename' style='color: rgb(95, 90, 82);'><b>Lattice&Light</b></h2>            
                    </div>
                    <div class='navright'>
                            <a href='index.php'><b>Home</b></a>
                            <span>|</span>
                            <a href='about_us.php'><b>About Us</b></a>
                            <span>|</span>
                            <a href='index.php #rooms'><b>Rooms</b></a>
                            <span>|</span>
                            <a href='tabel.php'><b>Reservations</b></a>

                            <?php if(isset($_SESSION['id_pelanggan'])): ?>
                            <form method='post' action='logout.php' style='display:inline;'><button type='submit' name='logout'>Log out</button></form>

                            <?php else: ?>
                            <form method='post' action='navbarlogin.php'><button name='navbarlogin' type='submit'>Log in</button></form>
                            <?php endif; ?>
                    </div>
                </nav>

            <div class='content'>
                <div class='pesan_content'>
                    <h2>Room Reservation</h2>

                    <form method='post' action='reservasi_aksi.php'>
                        <div class='pesan_content1'>
                            <label>Guest :</label>
                            <input type='text' name='nama' value='<?= $_SESSION['nama']; ?>' readonly><br>
                        

                        <div class='pesan_content2'>
                            <div class='pesan_content3'>
                                <label>Choose Room Type :</label><br>
                                <select name='id_kamar' required>
                                    <option value=''>-- Choose Room Type --</option>
                                    <?php while ($row = mysqli_fetch_assoc($result)){?>
                                    <option value='<?= $row['id_kamar']; ?>'>
                                    <?= $row['id_kamar'];?>. <?= $row['jenis_kamar']; ?> - Rp <?=number_format($row['harga']); ?>
                                    </option>
                                    <?php } ?>
                                </select><br><br>

                                <label>Check-in Date:</label><br>
                                <input type='date' name='check_in' required><br><br>

                                <label>Check-out Date :</label><br>
                                <input type='date' name='check_out' required><br><br>
                            </div>

                            <div class='pesan_content4'>
                                <label>Number of Guests :</label><br>
                                <input type='number' name='jmlhorg' min='1' value='1' required><br><br>
                                <label>Additional Notes :</label><br>
                                <textarea name='catatan' rows='4' cols='30' placeholder='ex. amount of pillows, a room near the lift'></textarea><br><br></div>
                        </div>
                    <button class='pesan' type='submit'>BOOK NOW</button>
                    </div></form>
                </div>
            </div>
        </div>

        <div class='badan2'>
            <footer class='footer'>
                <h3 style='font-size:15px; color:white; text-align:center;'>
                    Lattice&Light - 2025</h3>
            </footer>
        </div>


    </div>
        
</body>
</html>