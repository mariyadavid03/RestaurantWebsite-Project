<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: white;
        }

        header {
            background-color: white;
            top: 0;
        }

        .nav-bar {
            background-color: white;
            width: 100%;
            height: 80px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #004225;
            position: fixed;
            top: 0;
            z-index: 100;
        }

        .nav-logo {
            height: 65px;
            margin-left: 30px;
        }

        .nav-menu {
            list-style: none;
            display: flex;
            margin: 0;
        }
        
        .nav-menu li {
            transition: background-color 0.3s ease-in-out;
            margin: 0;
        }

        .nav-menu li a {
            text-decoration: none;
            color: #004225;
            padding: 20px;
            display: block;
            font-size: 18px;
        }

        .nav-menu li a:hover {
            color: grey;
        }

        .btnLogin a {
            text-decoration: none;
            font-size: 17px;
            color: black;           
        }

        .btnLogin {
            background-color: #ff8800;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
            padding: 12px;
            border: 1px solid white;
            margin-right: 5vh;
            margin-left: 7vh;
        }

        .btnLogin:hover,
        .btnLogout:hover {
            background-color: #f4f4f4;
            color: #004225;
            border: 1px solid #004225;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
        }

        .logged-name {
            padding-top: 10px;
            color: darkslategrey;
            padding-right: 20px;
        }

        .btnLogout{
            margin-right: 17px;
            background-color: #ff8800;
            padding: 10px;
            text-decoration: none;
            color: white ;
            border-radius: 5px;
            border: 1px solid white;
        }

        .name-login {
            padding: 10px;
        }

    /*Responsive Styles*/ 
    @media only screen and (max-width: 550px) {
            .nav-menu {
                padding: 20px;
            }
            .nav-menu li a {
                padding: 7px;
                font-size: 17px;
            }
            .nav-logo {
                display: none;
            }    
            .btnLogin {
                padding: 13px;
                margin-left: 1vh;
                margin-right: 10vh;
            }
            .btnLogin a {
            font-size: 13px;
            }
        }
    </style>
</head>
<body>
    <header>
        <!-- Navigation Bar Items-->
        <div class="nav-bar">
            <img src="images/outer-clove-high-resolution-logo-transparent.png" class="nav-logo">
            <nav>
                <ul class="nav-menu">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="facilities.php">Our Facilities</a></li>
                    <li><a href="menu.php">Menu</a></li>
                    <li><a href="order.php">Order</a></li>
                    <li><a href="reservation.php">Reserve</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                </ul>
            </nav>

            <div class="name-login">
                <?php 
                    if(isset($_SESSION['username'])) {
                    //Displaing the uername & button after login
                    echo '<span class="logged-name">Welcome, ' . $_SESSION['username'] . '</span>';
                    echo '<a class="btnLogout" href="PHP/logout.php">Logout</a>';
                    } else {
                        echo '<button class="btnLogin"><a href="login.php">Login</a></button>';
                    } 
                ?>    
            </div>
        </div>
    </header>
</body>
</html>
