<?php
    session_start();
    require_once('PHP/conn.php');

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
    <title>Sign Up</title>
    <link rel="stylesheet" href="CSS/signup-login.css">


</head>
<body>
    <a href="index.php">
        <img src="images/logo-logo.png" alt="" class="top-logo">
    </a>
    <!-- Sign Up Form -->
    <div class="auth-container">
        <form class="auth-form" method="post">
            <h2>Sign Up</h2>
            <label for="username">Username:</label>
            <input type="text" name="username" required>

            <label for="email">Email:</label>
            <input type="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" name="password" required>
            <label class="smalltxt">
                Already a member? <a href="login.php">LOGIN</a>    
            </label>
            <button type="submit" name="btnSignup">Sign Up</button>            
        </form>

        
        <?php  
        //Checking form submission & get credentials
        if(isset($_POST["btnSignup"])) {
            $username = $_POST["username"];
            $password = $_POST["password"];
            $email = $_POST["email"]; 
            $user_type = "Customer";  
            
            //Checking whether the exist
            try {
                $checkUser = $conn->prepare("SELECT * FROM users WHERE username = :username OR email = :email");
                $checkUser->bindParam(':username',$username);
                $checkUser->bindParam(':email', $email);
                $checkUser->execute();

                if($checkUser->rowCount() > 0){
                    echo '<h3><center>user already exists</center></h3>';
                }

                //Adding the new account details to the table
                else {
                    $user = $conn->prepare("INSERT INTO users (username, password, email, user_type) 
                                            VALUES (:username, :password, :email, :user_type)");
                    $user->bindParam(':username', $username);
                    $user->bindParam(':password', $password);
                    $user->bindParam(':email', $email);
                    $user->bindParam(':user_type', $user_type);
                    $user->execute();

                    echo '<h4>Registeration successful!</h4>';

                    $_SESSION["log"] = $username;
                    header( "refresh:2; url= index.php" );
                    exit();                    
                }

            } catch (Exception $e){
                echo 'Error: ' . $e->getMessage();
            }
        }
    ?>
    </div>

    

</body>
</html>
