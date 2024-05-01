<?php
    session_start();
    include 'PHP/item.php';

    //Checking form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        //Checking if the button was pressed
        if (isset($_POST['btnOrder'])) {

            // Retrieving the selected items from the form or set empty array
            $selectedItems = isset($_POST['selectedItems']) ? $_POST['selectedItems'] : [];
            $totalAmount = 0;

            // Iterate through items and calculate total
            foreach ($selectedItems as $selectedItemName) {
                $itemPrice = Item::getItemPriceByName($selectedItemName);
                if ($itemPrice !== null) {
                    $totalAmount += $itemPrice;
                }
            }

            //Storing total in SESSION
            $_SESSION['total'] = $totalAmount;
            header("Location: checkout.php");
            exit();
        }
    }

    $items = Item::getItem();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/order.css"> 
    <title>Order</title>
</head>
<body>
    <header>
        <?php include 'header.php'; ?>
    </header>
    <main>
        <div class="order-container">
            <h2>Order</h2>
            <!--Item Selecting Form -->
            <form method="post" >
                <table>
                    <?php foreach ($items as $item) : ?>
                        <tr>
                            <td>
                                <input type="checkbox" name="selectedItems[]" value="<?php echo $item->itemName; ?>">
                            </td>
                            <td><?php echo $item->itemName; ?></td>
                            <td>Rs.<?php echo $item->itemPrice; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>

                <button type="submit" name="btnOrder" class="btnOrder">Confirm Items</button>
               
            </form>

            <!--Display total of selected items -->
            <?php
            if (isset($_SESSION['total'])) {
                echo "<p class='total-amount'>Total Amount: {$_SESSION['total']}</p>";
            }
            ?>
        </div>
    </main>
    <footer>
        <?php include 'footer.php'; ?>
    </footer>

</body>
</html>
