<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: #f2f2f2; 
        }

        header {
            background-color: #333; 
            top: 0;
        }

        .nav-bar {
            background-color: #333;
            height: 100vh; 
            display: flex;
            width: 200px;
            flex-direction: column; 
            align-items: center; 
            border-right: 1px solid #666; 
            position: fixed;
            top: 0;
            left: 0;
            padding-top: 20px; 
        }

        .nav-logo {
            height: 65px;
            margin-bottom: 20px; 
        }

        .nav-menu {
            list-style: none;
            display: flex;
            flex-direction: column; 
            margin: 0;
            padding: 0;
        }

        .nav-menu li {
            transition: background-color 0.1s ease-in-out;
            margin: 10px 0; 
        }

        .nav-menu li:hover {
            background-color: #1f1e1e; 
        }

        .nav-menu li a {
            text-decoration: none;
            color: #ddd; 
            padding: 15px;
            display: block;
            font-size: 16px;
        }

        .nav-menu li a:hover {
            color: #fff; 
        }
        .btnLogout {
            margin: 60px 0 20px 0 !important;
            background-color: #1f1e1e;
            padding: 10px;
            text-decoration: none;
            color: white;
            border-radius: 5px;
            border: 1px solid white;
        }

        .btnLogout:hover {
            background-color: #666;
            color: #fff;
            border: 1px solid #fff;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <header>
        <!-- Navigation Bar -->
        <div class="nav-bar">
            <img src="../images/logo-logo.png" class="nav-logo">
            <nav>
                <ul class="nav-menu">
                    <li><a href="admin-home.php">Home</a></li>
                    <li><a href="reservation-manage.php">Manage Reservations</a></li>
                    <li><a href="order-manage.php">Manage Order</a></li>
                    <li><a href="menu-manage.php">Manage Menu</a></li>
                    <li><a href="admin-login.php">Logout</a></li>
                </ul>
            </nav>
        </div>
    </header>
</body>
</html>
