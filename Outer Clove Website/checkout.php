<?php
session_start();

include 'PHP/item.php';

// Accessing the session total
$totalPrice = isset($_SESSION['total']) ? floatval($_SESSION['total']) : 0;
// Checking form submission and button click
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['btnOrder'])) {
    
    //Checking if fields set & assiging values to variables
    $orderName = isset($_POST['order-name']) ? $_POST['order-name'] : null;
    $orderingService = isset($_POST['ordering-service']) ? $_POST['ordering-service'] : null;
    $cardNumber = isset($_POST['card-number']) ? $_POST['card-number'] : null;
    $deliveryAddress = isset($_POST['address']) ? $_POST['address'] : null;

    $currentTimestamp = date('Y-m-d H:i:s');
    Item::addOrder($orderName, $currentTimestamp, $orderingService, $totalPrice, $deliveryAddress);

    header('Location: payment.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/checkout.css">
    <title>Checkout</title>
</head>
    <body>
        <header>
            <?php include 'header.php'; ?>
        </header>
        <main>
            <!-- Checkout Form -->
            <div class="checkout-container">
                <div class="checkout-form">
                    <h2>Checkout</h2>

                    <div class="total-container">                    
                        <label>
                            <span class="total-label">Total:</span>
                            <!-- Displaying Total Taken From the Session -->
                            <?php echo 'Rs.' . $totalPrice; ?>
                        </label>
                    </div>

                    <form method="post">
                        <label for="order-name">Name</label>
                        <input type="text" name="order-name" placeholder="Enter your name" required>

                        <label for="ordering-service">Select Ordering Service</label>
                        <select id="ordering-service" name="ordering-service" required>
                            <option value="ubereats">Uber Eats</option>
                            <option value="pickme">Pick Me</option>
                            <option value="kapruka">Kapruka</option>
                        </select>

                        <label for="address">Delivery Address</label>
                        <textarea  name="address" placeholder="Enter your delivery address" required></textarea>

                        <button type="submit" name="btnOrder" class="btnOrder">Proceed to Pay</button>
                    </form>
                </div>
            </div>
        </main>
    </body>
</html>
