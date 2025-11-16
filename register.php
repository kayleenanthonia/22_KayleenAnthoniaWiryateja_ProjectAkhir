<?php
include 'koneksi.php';
//cek kalo form udh disubmit
if(isset($_POST['register'])){
    //ambil data dari form
    $username = $_POST['username'];
    $nama = $_POST['nama'];
    $hp = $_POST['hp'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'],
    PASSWORD_DEFAULT); //enkripsi password

    //simpan data ke database
    $query = "insert into pelanggan (username,password,nama,hp,email) values ('$username','$password','$nama','$hp','$email')";

    //eksekusi query
    $result = mysqli_query($koneksi,$query);

    //cek apakah query berhasil
    if($result){
        //redirect ke hlmn login
        echo "<script>alert ('Registration success! Please login to your account!');
        window.location='login.php';</script>";
    } else {
        //tampilkan pesan error
        echo "Gagal mendaftar :(";
    }
}?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Registration</title>
    <link rel="icon" href="logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel='stylesheet' href='register_style.css'>
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

    <div class='form_content'>
        <div class='form_content_form'>
        <h1>Account Registration</h1>
        <form method='post'>
                <p class='spasi'></p>
                <div class='fcf'>
                <div class='fcf_left'>
                <table>
                    <tr>
                        <td><label for='nama'>Full Name: </label></td></tr>
                    <tr><td><input type='text' name='nama' placeholder='Full Name' required></input></td>
                    </tr></tr><tr><td><p></p></td></tr>
                    <tr>
                        <td><label for='hp'>Phone Number : </label></td></tr>
                        <tr>
                        <td><input type='int' name='hp' placeholder='Phone Number' required></input></td>
                    </tr></tr><tr><td><p></p></td></tr>
                    <tr>
                        <td><label for='email'>E-mail : </label></td></tr>
                    <tr>
                        <td><input type='email' name='email' placeholder='name@email.com' required></input></td>
                    </tr></tr><tr><td><p></p></td></tr></table></div>
                    
                    <div class='fcf_right'>
                    <table><tr>
                        <td><label for='username'>Username : </label></td></tr>
                        <tr><td><input type='text' name='username' placeholder='Username' required></input></td>
                    </tr><tr><td><p></p></td></tr>
                    <tr>
                        <td><label for='password'>Password : </label></td></tr>
                        <tr><td><input type='password' name='password' placeholder='Password' required></input></td>
                    </tr></tr><tr><td><p></p></td></tr>
                    <tr>
                        <td colspan='3' style='text-align:center'><button type='submit' name='register'>SIGN UP</button></td></tr></td></tr>
                
                </table></div></div>
                    
                    
            </fieldset>
        </form>
</div>
    </div></div>

<div class='badan2'>
<footer class='footer'>
    <h3 style='font-size:15px; color:white; text-align:center;'>
        Lattice&Light - 2025</h3>
</footer>
</div></div>
</body>
</html>