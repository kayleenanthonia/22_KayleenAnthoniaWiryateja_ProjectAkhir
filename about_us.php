<?php
session_start();
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="icon" href="logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link href='about_us.css' rel='stylesheet'/>
</head>
<body style="background-image: url(bghome.jpg); background-size: cover; background-position: center center; background-repeat: no-repeat; background-attachment: fixed; font-family: 'Times New Roman', Times, serif;">
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
                <div class='carou'>
                    <div id="carouselExampleIndicators" class="carousel slide">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                        <img src="frontdesk.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                        <img src="exterior.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                        <img src="outdoor.jpg" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                    </div>                    
                </div>

                <div class='aboutus'>
                    <h3>Welcome to Lattice&Light.</h3>
                    <p>We believe true luxury is found in tranquility and light. Our vision is to offer a boutique haven where elegant design and genuine warmth meet the ultimate escape. We set out to create more than just a place to sleep; we offer a curated sanctuary for those seeking refined comfort and absolute peace.</p>
                </div>
            </div>

            <div class='content2'>
                <div class='aboutus2'>
                    <img src='dining.jpg' style='width:450px; height0px;'>
                    <div class='abtext'>
                        <h3>Our Story</h3>
                        <p>Lattice & Light began as a passion project—a desire to share the serenity of this beautiful coastal location. Inspired by the architectural simplicity of traditional inns and the abundant natural light, we transformed the property into a guesthouse that celebrates unhurried living. Every detail, from the bedding to the placement of the sunlit pool, has been intentionally chosen to ensure your stay feels personal, memorable, and restorative.</p>
                    </div>
                </div><br>

                <div class='aboutus2'>
                    <div class='abtext' style='text-align:right;'>
                        <h3>Our Promise to You</h3>
                        <p>We stand by a few core values that define the Lattice & Light experience:
                            <ul>
                                <li>Curated Comfort: Enjoy beautifully designed rooms with luxurious amenities, ensuring every moment inside is as relaxing as the coastal air.</li>
                                <li>Coastal Tranquility: Our property is a serene escape, dedicated to peace and quiet, allowing you to fully disconnect and unwind.</li>
                                <li>Genuine Warmth: Expect attentive, friendly service that anticipates your needs without ever feeling intrusive.</li>
                            </ul></p>
                    </div>
                    <img src='outdoor2.jpg' style='width:450px; height0px;'>                    
                </div>
            </div>

            <div class='content' style='color:white; text-align:center;'>
                <h3>Connect with Us</h3>
                <p>Ready to experience your coastal haven? We are always happy to answer your questions.<br>
                    Phone Number: 08117112025 | 
                    Email: latticeandlight@gmail.com</p>
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