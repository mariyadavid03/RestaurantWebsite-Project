<?php
    session_start();
    require_once('PHP/conn.php');
    try {
        $conn = Conn::getConnection();
    } catch (Exception $e) {
        echo "Connection failed: " . $e->getMessage();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/signup-login.css">
    <title>Login</title>
</head>
<body>
    <a href="index.php">
        <img src="images/logo-logo.png" alt="" class="top-logo">
    </a>
    
    <!-- Login Form -->
    <div class="auth-container">  
        <form method="post" class="auth-form" >
            <h2>Login</h2>
            <label for="username">Username</label>
            <input type="text"  name="username" required>

            <label for="password">Password</label>
            <input type="password" name="password" required>
            <label class="smalltxt">Not a member? 
                <a href="signup.php">SIGN UP</a>
            </label>         
            <button type="submit" name="btnLogin">Login</button>
        </form>

        <?php
            //Checking form submission & getting username and password
            if(isset($_POST["btnLogin"])){
                $username = $_POST["username"];
                $password = $_POST["password"];

                //Checking user from the table
                try {
                    $user = $conn->prepare("SELECT * FROM users WHERE username = :username AND user_type = 'Customer'");
                    $user->bindParam(':username', $username, PDO::PARAM_STR);
                    $user->execute();

                    if($user->rowCount() > 0) {
                        $row = $user->fetch(PDO::FETCH_ASSOC);

                        if($password == $row["password"]){
                            //Storing username in a SESSION
                            $_SESSION['username'] = $username;
                            header("location:index.php");
                            exit();
                        }
                    } else {
                        echo '<h4> Incorrect user or password</h4>';
                    }
                } catch (Exception $e) {
                    echo 'Error: ' . $e->getMessage();
                }
                
            }
        ?>
    </div>

</body>
</html>
