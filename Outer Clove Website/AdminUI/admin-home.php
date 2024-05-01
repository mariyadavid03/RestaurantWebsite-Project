<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: #f2f2f2;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        main {
            padding-left: 200px;
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
            font-size: 60px;
        }

        .home-link a {
            text-decoration: none;
            color: #007BFF; 
            font-weight: bold;
            font-size: 18px;
        }

        .home-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <header>
        <?php include 'admin-header.php'; ?>
    </header>
    <main>
        <?php
            // Display welcome message
            echo '<h2>Welcome ';
            
            // Check user type and display it if not 'Admin' or 'Staff'
            if ($_SESSION['user_type'] == 'Admin' || $_SESSION['user_type'] == 'Staff') {
                echo $_SESSION['user_type'];
            } else {
                echo ' ';
            }
            
            echo '</h2>';
        ?>
        <label class="home-link">
            <a href="../UI/home.php">
                Public Website Link
            </a>
        </label>
    </main>
</body>
</html>
