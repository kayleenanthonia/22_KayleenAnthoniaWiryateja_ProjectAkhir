<?php 

session_start();//
include 'koneksi.php';//

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "select * from pelanggan where username='$username'";
    $result = mysqli_query($koneksi,$query);
    $user = mysqli_fetch_assoc($result);

    if($user && password_verify($password,$user['password'])){
        $_SESSION['username'] = $user['username'];
        $_SESSION['nama'] = $user['nama'];
        $_SESSION['id_pelanggan'] = $user['id_pelanggan'];
        header ("Location: reservasi.php");
    } else {
        echo "<script>alert('Incorrect password or username!');</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login to your account</title>
    <link rel="icon" href="logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link href='login_style.css' rel='stylesheet'/>
    
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

    <div class='login_content'>
    <!-- dijadiin 1 -->
    <div class='login'>
        <h1 class='header1'>Login</h1>
            <form method='post'>
                <!-- <label>Username:</label><br>
                <input type='text' name='username' placeholder='Username'></input><br><br>

                <label>Password:</label><br>
                <input type='password' name='password' placeholder='Password'></input><br><br>
                <button type='submit' name='login'>Login</button> -->


                <table>
                <tr>
                <td><label for='username'>Username :</label></td>
                <tr>
                <td><input type='text' name='username' placeholder='Username'></input></td></tr>
                <tr><td><p></p></td></tr>

                <tr>
                <td><label for='password'>Password :</label></td></tr>
                <tr>
                <td><input type='password' name='password' placeholder='Password'></input></td></tr>

                <tr><td><p></p></td></tr>
                <tr>
                <td colspan='3' style='text-align:center'><button type='submit' name='login'>LOGIN</button></td></tr>

                <tr><td></td></tr><tr>
                    <td colspan='3' style='text-align:Center'>
                    <p>Don't have an account? | <a class='ab' href='register.php'>Sign up</a></p></td></tr>
                </table>
            </form>


    </div>
</div></div>


<div class='badan2'>
<footer class='footer'>
    <h3 style='font-size:15px; color:white; text-align:center;'>
        Lattice&Light - 2025</h3>
</footer></div></div>
    
</body>
</html>