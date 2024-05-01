<?php
    session_start();
    require_once('../PHP/conn.php');

    try {
        $conn = Conn::getConnection();
    } catch (Exception $e) {
        die("Connection failed: " . $e->getMessage());
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../AdminUI/CSS/login.css"> 
    <title>Admin Login</title>
</head>
<body>
    <!--Login Form -->
    <div class="login-container">
        <h2>Login</h2>

        <form method="post" >
            <label for="admin-username">Username:</label>
            <input type="text" name="username" required>

            <label for="admin-password">Password:</label>
            <input type="password"  name="password" required>

            <button type="submit" name="btnAdLogin" class="btnAdLogin">Login</button>
        </form>

        <?php
            // Checking whether the button was clicked
            if(isset($_POST["btnAdLogin"])){
                $username = $_POST["username"];
                $password = $_POST["password"];

                // SQL Statement to validate user information
                try {
                    $user = $conn->prepare("SELECT * FROM users WHERE username = :username");
                    $user->bindParam(':username', $username, PDO::PARAM_STR);
                    $user->execute();

                    if($user->rowCount() > 0) {
                        $row = $user->fetch(PDO::FETCH_ASSOC);

                        if($password == $row["password"]){
                            $_SESSION['user_name'] = $username;

                            // Saving user_type in session
                            $_SESSION['user_type'] = $row['user_type'];

                            if (($row['user_type'] == 'Staff') || ($row['user_type'] == 'Admin'))  {
                                header("location:admin-home.php");
                                exit();
                            }
                            else {
                                echo '<h4>Incorrect username or password</h4>';
                            }
                        } else {
                            echo '<h4>Incorrect username or password</h4>';
                        }
                    } else {
                        echo '<h4>Incorrect username or password</h4>';
                    }
                } catch (Exception $e) {
                    echo 'Error: ' . $e->getMessage();
                }
            }
        ?>
    </div>
</body>
</html>
