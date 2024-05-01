<?php
    require_once('PHP/conn.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/reservation.css">
    <title>Reservation</title>
</head>
<body>

    <header>
        <?php include 'header.php'; ?>
    </header>

    <main class="reservation-container">

        <!-- Displaying Seating Area Images -->
        <div class="image-container">
            <img src="images/main-seating.jpg" >
            <img src="images/private-seating.jpg" >
            <img src="images/booth-seating.jpg" >
            <img src="images/outdoor-seating.jpeg" >
        </div>

        <!-- Reservation Form -->
        <div class="form-container">
            <h2>Reservation Form</h2>
            <form method="post">
                <label>Name:</label>
                <input type="text" name="name" required>

                <label>Email:</label>
                <input type="email"  name="email" required>

                <label>Date:</label>
                <input type="date"  name="date" required>

                <label>Time:</label>
                <input type="time"  name="time" required>

                <label>No. of Guests:</label>
                <input type="number" name="number" required>
                
                <label>Choose Dining Area:</label>
                <select name="area" required>
                    <option value="private-hall">Private Hall</option>
                    <option value="main-hall">Main Hall</option>
                    <option value="booth">Booth</option>
                    <option value="outdoor">Outdoor Dining</option>
                </select>
                <button type="submit" name="btnReserve">Reserve</button>
            </form>
        </div>
    </main>

    <?php
        // Checking "Reserve" button is clicked
        if (isset($_POST["btnReserve"])) {
            $name = $_POST["name"];
            $email = $_POST["email"];
            $date = $_POST["date"];
            $time = $_POST["time"];
            $number = $_POST["number"];
            $area = $_POST["area"];

            //SQL Statements when the user is logged in
            if (isset($_SESSION['username'])) {
                $username = $_SESSION['username'];
                try {
                    $conn = Conn::getConnection();
                    $query = $conn->prepare("INSERT INTO `reservations`
                            (`username`, `name`, `email` , `date`, `time`, `no_guests`, `seating_type`) 
                            VALUES
                            (:username, :name, :email ,:date, :time, :no_guests, :seating_type)");
                    $query->execute([':username' => $username, ':name' => $name, ':email' => $email,
                        ':date' => $date, ':time' => $time, ':no_guests' => $number,
                        ':seating_type' => $area]);
                    echo '<div class="success-message">Reservation successful!</div>';


                } catch (Exception $e) {
                    echo 'Error: ' . $e->getMessage();
                }

            } else {
                //SQL Statements when the user is NOT logged in
                try {
                    $conn = Conn::getConnection();
                    $query = $conn->prepare("INSERT INTO `reservations`
                            (`name`, `email` , `date`, `time`, `no_guests`, `seating_type`) 
                            VALUES
                            (:name, :email ,:date, :time, :no_guests, :seating_type)");
                    $query->execute([':name' => $name, ':email' => $email,
                        ':date' => $date, ':time' => $time, ':no_guests' => $number,
                        ':seating_type' => $area]);
                    echo '<div class="success-message">Reservation successful!</div>';


                } catch (Exception $e) {
                    echo 'Error: ' . $e->getMessage();
                }
            }
        }
    ?>

    <footer>
        <?php include 'footer.php'; ?>
    </footer>

</body>
</html>
