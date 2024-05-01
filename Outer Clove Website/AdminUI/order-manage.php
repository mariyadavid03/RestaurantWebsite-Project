<?php
session_start();
include("../PHP/conn.php");
include("../PHP/item.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["btnConfirm"])) {
        $orderId = $_POST["orderId"];

        try {
            $conn = Conn::GetConnection();
            $query = "UPDATE `orders` SET confirmed_status = 1 WHERE order_id= :orderId";
            $st = $conn->prepare($query);
            $st->bindValue(":orderId", $orderId, PDO::PARAM_INT);
            $st->execute();
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }

    } elseif (isset($_POST["btnRemove"])) {
        $orderId = $_POST["orderId"];
        try {
            $conn = Conn::GetConnection();
            $query = "DELETE FROM `orders` WHERE order_id = :orderId";
            $st = $conn->prepare($query);
            $st->bindValue(":orderId", $orderId, PDO::PARAM_INT);
            $st->execute();
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }

    }
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

$orders = Item::getOrders();
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
    <h2>Manage Orders</h2>
    <table>
        <thead>
        <tr>
            <th>Customer Name</th>
            <th>Ordered Date</th>
            <th>Odered Service</th>
            <th>Total Price</th>
            <th>Address</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
        <?php
        // Display orders
        foreach ($orders as $order) {
            echo '<tr>';
            echo '<td>' . $order['name'] . '</td>';
            echo '<td>' . $order['order_date'] . '</td>';
            echo '<td>' . $order['service'] . '</td>';
            echo '<td>Rs. ' . $order['total_price'] . '</td>';
            echo '<td>' . $order['address'] . '</td>';
            echo '<td>';
            echo '<form method="post" class="button-container">';
            
            if ($order['confirmed_status'] == 1) {
                echo 'Confirmed';
            } else {
                if ($_SESSION['user_type'] == 'Admin') {
                    echo '<input type="hidden" name="orderId" value="' . $order['order_id'] . '">';
                    echo '<button type="submit" name="btnConfirm" class="btnConfirm">Confirm</button>';
                    
                    echo '<input type="hidden" name="orderId" value="' . $order['order_id'] . '">';
                    echo '<button type="submit" name="btnRemove" class="btnRemove">Remove</button>';
                } else {
                    echo ' ';
                }
            }

            echo '</form>';
            echo '</td>';
            echo '</tr>';
        }

        if (empty($orders)) {
            echo '<tr><td colspan="5">No orders found</td></tr>';
        }
        ?>
        </tbody>
    </table>
</main>
</body>
</html>
