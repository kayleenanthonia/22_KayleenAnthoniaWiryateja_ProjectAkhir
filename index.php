<?php
session_start();
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="icon" href="logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link href='index.css' rel='stylesheet'/>

</head>
<body style='background: linear-gradient(rgba(255, 251, 247, 0.98), rgb(241, 229, 208));background-size: cover; background-position: center center; background-repeat: no-repeat; background-attachment: fixed;'>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    
    <div class='badan'>
        <div class='badan1'>
            <div class='jumbotron' style='background-image: url(jumbo.jpg); background-position: center; background-size: cover;'>
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
                <div class='isijumbo'>
                    <h2>Welcome to</h2>
                    <h1><i>Lattice&Light Inn</i></h1><br>
                    <h6>Your Coastal Haven. Refined Restraint & Tranquil Stays.</h6>
                    <br>
                    <form method='post'><button type='submit'><a class='ab' href='about_us.php'>About Us</a></button></form>
                </div>
            </div>


            <div class='content' id='rooms'>
                <h1>Our Rooms</h1><br>

                <div class='rooms'>
                    <div class='card'>
                        <img src='standard.jpg' class='cardimg'>

                        <div class='cardbody'>
                            <h5 class='cardtitle'>The Standard Retreat</h5>
                            <p>Your cozy haven. All essential comforts provided, featuring high-quality bedding and tranquil design. 
                                <hr>AC, Wi-Fi, TV</p><br>
                            
                            <form method='post'><button type='submit'><a class='ab' href='reservasi.php'>Book Now</a></button></form>
                        </div>
                    </div>

                    <div class='card'>
                        <img src='deluxe.jpg' class='cardimg'>

                        <div class='cardbody'>
                            <h5 class='cardtitle'>The Deluxe Sanctuary</h5>
                            <p>Spacious and refined. Enjoy dedicated sitting areas and a larger layout. Includes our Signature Daily Gourmet Breakfast.
                                <hr>Breakfast, AC, Wi-Fi, TV</p><br>
                            
                            <form method='post'><button type='submit'><a class='ab' href='reservasi.php'>Book Now</a></button></form>
                        </div>
                    </div>

                    <div class='card'>
                        <img src='suite.jpg' class='cardimg'>

                        <div class='cardbody'>
                            <h5 class='cardtitle'>The Signature Suite</h5>
                            <p>Ultimate elegance. Our largest room, featuring a soaking tub and private balcony access.
                                <hr>Balcony, Bathtub, Breakfast, AC, Wi-Fi, TV</p>
                            
                            <form method='post'><button type='submit'><a class='ab' href='reservasi.php'>Book Now</a></button></form>
                        </div>
                    </div>
                </div>

                <div class='reviews'>
                    <h1>Testimonials</h1><br>
                    <div class='rev'>
                        <p>"We felt instantly restored. The 'Lattice & Light' aesthetic is more than just beautiful—it's truly calming. From the stunning pool area to the incredible Suite, everything felt intentionally designed for peace. A true coastal sanctuary." <br>
                        — Amelia R., Stayed in the Signature Suite</p>
                        <p>"The attention to detail here is unmatched. It felt less like a hotel and more like staying at a beautifully curated friend's home. The hosts were wonderfully warm, and the daily breakfast was exquisite. This is our new go-to for refined respite."<br>
                        — Ethan S., Via Google Reviews</p>
                    </div><br>
                    <div class='rev'>
                        <p>"Absolutely worth the investment. We booked the Deluxe Sanctuary and were blown away by the space and comfort. It's the perfect blend of high-end luxury and cozy intimacy. The best boutique stay we've ever had."<br>
                        — The Chen Family, Weekend Getaway</p>
                        <p>"From the moment we arrived, we felt instantly transported. The property is immaculate, and the rooms truly embody that 'Lattice & Light' feeling—so bright, clean, and elegant. The fireplace in the Standard room was such a special touch. The perfect blend of luxury and intimate escape. We can't wait to return."<br>
                — Mr. & Mrs. Davies, Anniversary Stay</p>
                    </div>

                </div>

            </div>

            <div class='contact' style='text-align:center;'>
                <h3>Connect with Us</h3>
                <p>Ready to experience your coastal haven? We are always happy to answer your questions.<br>
                    Phone Number: 08117112025 | 
                    Email: latticeandlight@gmail.com</p>
            </div>



        </div>

        <div class='badan2'>
            <footer class='footer'>
                <h3 style='font-size:15px; text-align:center;'>
                    Lattice&Light - 2025</h3>
            </footer>
        </div>
    </div>
</body>
</html>