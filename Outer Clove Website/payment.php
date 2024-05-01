<?php
    // Checkinf if the button is clicked 
    if (isset($_POST["btnConfirm"])) {
        $paymentSuccessMessage = "Transaction Successful!";

        //redirect to home after the message display
        header( "refresh:2; url= index.php" ); 
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payement Gateway</title>
    <link rel="stylesheet" href="CSS/payment.css">
</head>
<body>
    <div>
        <h1>Payment Form</h1>

        <!-- Accepted Cards -->
        <div class="credit-card-img">
            <img src="images/PayementImages/mastercard.png" alt="MasterCard">
            <img src="images/PayementImages/Visa Payment Card.png" alt="Visa">
            <img src="images/PayementImages/payapl.png" alt="PayPal">
            <img src="images/PayementImages/amex.png" alt="AmericanExpress">
        </div>

        <!-- Form for entering card details -->
        <div class="card-details">
            <label>Card Number</label>
            <input type="number" name="cardnumber" placeholder="Enter Card Number">
            <label>CVV</label>
            <input type="number" name="cvv" placeholder="Enter CVV">
            <label>Card Owner</label>
            <input type="text" name="name" placeholder="Enter Card Owner Name">
        </div>
        
        <form method="post">
            <button type="submit" class="btnConfirm" name="btnConfirm">Confirm Payment</button>
        </form>
        <?php
            //Sucess Message Displaying
            if (isset($paymentSuccessMessage)) {
                echo '<p style="color: green; text-align: center;">' . $paymentSuccessMessage . '</p>';
            }
        ?>
    </div>
</body>
</html>