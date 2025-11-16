<?php

session_start();
include 'koneksi.php';

//user udh login
if(!isset($_SESSION['id_pelanggan'])){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservations List</title>
    <link rel="icon" href="logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link href='tabel_style.css' rel='stylesheet'/>
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
                <div class='table_content'>
                    <h1>Reservations</h1><br>

                    <table border='1'>
                        <tr>
                            <!-- <th>No</th> -->
                            <th>Guest</th>
                            <th>Room Type</th>
                            <th>Check-in</th>
                            <th>Check-out</th>
                            <th>Number of Guests</th>
                            <th>Additional Notes</th>
                            <th>Options</th>
                        </tr>

                        <?php
                        include 'koneksi.php';
                        $query = "select r.id_reservasi, p.nama as nama_pelanggan,
                        k.jenis_kamar, r.check_in, r.check_out, r.jmlhorg, r.catatan 
                        from reservasi r
                        join pelanggan p on r.id_pelanggan=p.id_pelanggan
                        join kamar k on r.id_kamar = k.id_kamar
                        order by r.id_reservasi asc";
                        $result = mysqli_query($koneksi,$query);
                        while($t = mysqli_fetch_assoc($result)){
                            ?>
                            <tr>
                                <td><?php echo $t['nama_pelanggan']; ?></td>
                                <td><?php echo $t['jenis_kamar']; ?></td>
                                <td><?php echo $t['check_in']; ?></td>
                                <td><?php echo $t['check_out']; ?></td>
                                <td><?php echo $t['jmlhorg']; ?></td>
                                <td><?php echo $t['catatan']; ?></td>
                                <td>
                                    <a class='ab' href='update.php?id=<?php echo $t['id_reservasi']; ?>'>UPDATE</a>
                                    <span>|</span>
                                    <a class='ab' href='delete.php?id=<?php echo $t['id_reservasi']; ?>'
                                        onclick="return confirm('Are you sure you want to delete this reservation?')">
                                        DELETE</a>
                        </td>
                        </tr>
                        <?php
                        }
                        ?>
                    </table><br><br>
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