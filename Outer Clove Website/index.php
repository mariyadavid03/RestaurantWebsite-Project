<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="CSS/home.css">
</head>

<body>+
    <header>
        <?php include 'header.php'; ?>
    </header>
        
    <main>
        <!-- Resturant Title -->
        <div class="main-content">
            <div class="main-details">
                <div class="small-title">GREAT  PLACE.  GREAT  FOOD.</div>
                <img src="images/logo-white.png" class="main-title">
                <div class="main-desc">A Culinary Oasis for Those Seeking a Perfect Blend of Ambiance and Taste.
                </div>
            </div>
        </div>

        <!-- Offers & Promotions-->
        <div class="promo">
            <div class="promo-post1">
                <div class="promo-details">
                    <div class="promo-title">Exclusive Weekend Offers</div>
                    <div class="promo-desc">Enjoy Special Dinner Offers every weekend! Delight in our exquisite menus with a generous discount.</div>
                </div>
                <img src="images/fine-dining .jpg" class="promo-img" alt="Exclusive Weekend Offers">
            </div>

            <div class="promo-post2">
                <img src="images/family-promo.jpg" class="promo-img2" alt="Family Feast Night">
                <div class="promo-details2">
                    <div class="promo-title">Family Feast Night</div>
                    <div class="promo-desc">
                        Join us every Wednesday for our exclusive Family Feast Night at Outer Clove!
                        Treat your loved ones to a delightful dining experience for just Rs. 2500, 
                        enjoy a specially curated family-style menu.
                    </div>
                </div>
            </div>
        </div>

        <!-- Menu -->         
        <div class="menu-post">
                <div class="menu-details">
                    <div class="menu-title">Our Menu</div>
                    <div class="menu-desc">
                        Savor a culinary journey through our diverse menu, 
                        featuring the week's top appetizer, main course, and dessert. 
                    </div>

                    <!-- Menu Items of the Week -->
                    <div class="menu-items-post">
                        <div class="menu-item">
                            <label class="item-title">Apptizer of the Week</label>
                            <br>
                            <img src="images/MenuImages/44.jpg" class="item-img">
                            <br>
                            <label class="item-name">Spring Rolls</label>
                        </div>
                        <div class="menu-item">
                            <label class="item-title">Main Course of the Week</label>
                            <br>
                            <img src="images/MenuImages/49.jpg" class="item-img">
                            <br>
                            <label class="item-name">Lasanga</label>
                        </div>
                        <div class="menu-item">
                            <label class="item-title">Dessert of the Week</label>
                            <br>
                            <img src="images/MenuImages/43.jpg" class="item-img">
                            <br>
                            <label class="item-name">Lemon Ricotta</label>
                        </div>
                    </div>
                    <button class="section-btn">
                        <a href="menu.php">View Menu</a>
                    </button>
                </div>
        </div>
        
        <!-- Dining Options -->
        <div class="dining-content">
            <br>
            <br>
            <label class="dining-heading">Ways to Enjoy Our Service </label>
            <div class="dining-op">
                <div class="op">
                    <br><br><br><br>
                    <img src="images/dine-in.jpg" class="op-img">
                    <br>
                    <label class="op-name">Dine-in</label>
                </div>

                <div class="op">
                <br><br><br><br>
                    <img src="images/takeout.png" class="op-img">
                    <br>
                    <label class="op-name">Takeout</label>
                </div>

                <div class="op">
                <br><br><br><br>
                    <img src="images/delivery.png" class="op-img">
                    <br>
                    <label class="op-name">Delivery</label>
                </div>
            </div>
        </div>


        <!-- About -->
        <div class="about">
        <h2>About Us</h2>

        <div class="about-post">         
            <div class="about-card">
                <img src="images/about-us-1.jpg" class="about-img" alt="Our History">
                <div class="about-details">
                    <h3>Our History</h3>  
                    <p>
                        Celebrating a decade of culinary excellence, 
                        Outer Clove has been a beacon of delight 
                        since its inception. From humble beginnings 
                        to becoming a renowned culinary destination,
                        we take pride in our rich history that mirrors our 
                        commitment to providing an extraordinary dining experience.
                    </p>
                </div>
            </div>
        </div>

        <div class="about-post">         
            <div class="about-card">
                <div class="about-details">
                    <h3>Culinary Excellence</h3>  
                    <p>
                        At Outer Clove, we believe that great food transcends borders. 
                        Our culinary team, composed of passionate chefs from around 
                        the world, brings a global touch to every dish. From classic 
                        comfort foods to avant-garde creations, we curate a diverse menu 
                        that reflects our love for good food and our commitment to quality.
                    </p>
                </div>
                <img src="images/about-us-2.jpg" class="about-img" alt="Culinary Excellence">
            </div>
        </div>

        <div class="about-post">         
            <div class="about-card">
                <img src="images/about-img.jpg" class="about-img" alt="Our Promise">
                <div class="about-details">
                    <h3>Our Promise</h3>  
                    <p>
                        We strive to create more than just a meal; we craft an 
                        experience that lingers in your memory. Whether you're savoring 
                        the familiar flavors of home or exploring the nuances of 
                        international cuisines, Outer Clove is your passport to a culinary adventure.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Reservation --> 
    <div class="reserve">
        <div class="reserve-post">
            <ul>
                <li class="reserve-heading">Reservation </li>
                <li class="reserve-desc">
                    Embark on a gastronomic adventure at The Outer Clove, where culinary artistry meets elegance. 
                    Secure your table now to relish exceptional dishes in a delightful atmosphere.   
                </li>
                <li class="reserve-button">
                    <a href="reservation.php">Book Now</a>    

                </li>         
            </ul>
        </div>
    </div>

    <footer>
        <?php include 'footer.php'; ?>
    </footer>
        
</body>

</html>
