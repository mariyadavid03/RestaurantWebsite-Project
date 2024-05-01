<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
    footer {
        background-color: #f4f4f4;
        color: #004225;
        padding: 20px 0;
        text-align: center;
        width: 100%;
 
    }

    .footer-content {
        display: flex;
        justify-content: space-between;
        max-width: 1200px;
        margin: 0 auto;
    }

    .footer-contact,
    .footer-links,
    .footer-hours {
        flex: 1;
        padding: 0;
        list-style: none;
    }

    .footer-links a {
        color: #004225; 
        text-decoration: none;
    }
    .footer-heading {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 10px;
        color: #004225;
    }

    .footer-contact ul,
    .footer-links ul,
    .footer-hours ul {
        padding: 0;
        margin: 0;
        list-style: none;
    }

    .footer-contact li,
    .footer-links li,
    .footer-hours li {
        margin-bottom: 8px;
        list-style: none;
        text-decoration: none;
        
    }

    .footer-hours li:last-child {
        margin-bottom: 0;
    }

    p {
        margin-top: 20px;
        text-decoration: none;
    }

    @media only screen and (max-width: 550px) {
        footer {
            width: 100%;
            
        }
        
    }
</style>
</head>
<body>
    <footer>
        <div class="footer-content">
            <div class="footer-contact">
                <label class="footer-heading">Contact Us</label>
                <ul>
                    <li>No 32, Kandy Road, Matale</li>
                    <li>+94 526 6637</li>
                    <li>+94 872 6377</li>
                    <li>outerclovekandy@gmail.com</li>
                </ul>
            </div>

            <div class="footer-links">
                <label class="footer-heading">Quick Links</label>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="facilities.php">Our Facilities</a></li>
                    <li><a href="menu.php">Menu</a></li>
                    <li><a href="order.php">Order</a></li>
                    <li><a href="reservation.php">Reserve</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                </ul>
            </div>

            <div class="footer-hours">
                <label class="footer-heading">Open Hours</label>
                <ul>
                    <li>Monday to Thursday</li>
                    <li>9:00AM - 10:30PM</li>
                    <li>Friday, Saturday, Sunday</li>
                    <li>9AM:AM - 12:00AM</li>
                </ul>
            </div>
        </div>

        <p>&copy; 2023 The Outer Clove Restaurant</p>
    </footer>

</body>
</html>