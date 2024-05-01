<?php
session_start();
include("../PHP/conn.php");
include("../PHP/item.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["btnConfirm"])) {
        $reservationId = $_POST["reservation_id"];

        try {
            $conn = Conn::GetConnection();
            $query = "UPDATE reservations SET confirmed_status = 1 WHERE reservation_id = :reservationId";
            $st = $conn->prepare($query);
            $st->bindValue(":reservationId", $reservationId, PDO::PARAM_INT);
            $st->execute();
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }

    } elseif (isset($_POST["btnRemove"])) {
        $reservationId = $_POST["reservation_id"];
        try {
            $conn = Conn::GetConnection();
            $query = "DELETE FROM `reservations` WHERE reservation_id = :reservationId";
            $st = $conn->prepare($query);
            $st->bindValue(":reservationId", $reservationId, PDO::PARAM_INT);
            $st->execute();
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
        
    }
    header("Location: ".$_SERVER['PHP_SELF']);
        exit();
}


$revs = Item::getReservations();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Orders</title>
    <link rel="stylesheet" href="CSS/order.css">
</head>
<body>
    <header>
        <?php include 'admin-header.php'; ?>
    </header>
    <main>
        <h2>Manage Reservations</h2>
        <table>
            <thead>
                <tr>
                    <th>Customer Name</th>
                    <th>Email</th>
                    <th>Reserved Date</th>
                    <th>Reserved Time</th>
                    <th>Number of Guests</th>
                    <th>Seating Type</th>
                    <th>Username (if logged in)</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Display reservations
                foreach ($revs as $rev) {
                    echo '<tr>';
                    echo '<td>' . $rev['name'] . '</td>';
                    echo '<td>' . $rev['email'] . '</td>';
                    echo '<td>' . $rev['date'] . '</td>';
                    echo '<td>' . $rev['time'] . '</td>';
                    echo '<td>' . $rev['no_guests'] . '</td>';
                    echo '<td>' . $rev['seating_type'] . '</td>';
                    echo '<td>' . $rev['username'] . '</td>';
                    echo '<td>';
                    
                    // Check user type before displaying buttons
                    if ($rev['confirmed_status'] == 1) {
                        echo 'Confirmed';
                    } else {

                        if ($_SESSION['user_type'] == 'Admin') {
                            echo '<form method="post" class="button-container">';
                            
                                echo '<input type="hidden" name="reservation_id" value="' . $rev['reservation_id'] . '">';
                                echo '<button type="submit" name="btnConfirm" class="btnConfirm">Confirm</button>';
                                
                                echo '<input type="hidden" name="reservation_id" value="' . $rev['reservation_id'] . '">';
                                echo '<button type="submit" name="btnRemove" class="btnRemove">Remove</button>';
                           
                            }
                            else {
                                echo ' ';
                            }

                    }    
                    
                    echo '</form>';
                    echo '</td>';
                    echo '</tr>';
                }
                if (empty($revs)) {
                    echo '<tr><td colspan="5">No Reservations found</td></tr>';
                }
                ?>
            </tbody>
        </table>
    </main>
</body>
</html>


