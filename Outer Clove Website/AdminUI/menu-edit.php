<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Item</title>
    <link rel="stylesheet" href="CSS/menu-manage.css">
</head>
<body>
    <header>
        <?php include 'admin-header.php'; ?>
    </header>
    <main>
        <h2>Edit Item</h2>
        <?php
            include("../PHP/item.php");
            //Checking the itemId or else set the default to null
            $itemId = isset($_GET['itemId']) ? $_GET['itemId'] : null;

            if ($itemId) {
                $item = Item::getItemById($itemId);

                if ($item) {
        ?>
                <!-- Menu Editing Form --> 
                <form method="post" enctype="multipart/form-data" class="edit-form">
                    <input type="hidden" name="itemId" value="<?php echo $item->itemId; ?>">
                    <label for="itemName">Item Name</label>
                    <input type="text" name="itemName" value="<?php echo $item->itemName; ?>">

                    <label for="itemCusine">Cuisine Type</label>
                    <input type="text" name="itemCusine" value="<?php echo $item->itemCusine; 
                    ?>">

                    <label for="itemDietary">Dietary</label>
                    <input type="text" name="itemDietary" value="<?php echo $item->itemDietary; ?>">

                    <label for="itemService">Service Type</label>
                    <input type="text" name="itemService" value="<?php echo $item->itemService; ?>">

                    <label for="itemPrice">Price</label>
                    <input type="text" name="itemPrice" value="<?php echo $item->itemPrice; ?>">

                    <label for="itemImage">Image</label>
                    <input type="file" name="itemImage">
                    
                    <button type="submit" name="btnUpdate" class="btnUpdate">Update</button>
                </form>
                <?php
            } else {
                echo "Item not found.";
            }
        } else {
            echo "Item ID not provided.";
        }
        ?>
    </main>
    <?php
        //Checking if the Update is clicked   
        if (isset($_POST['btnUpdate'])) {
            $itemId = isset($_POST['itemId']) ? $_POST['itemId'] : null;

            if ($itemId) {
                $item = Item::getItemById($itemId);

                //Item storing process
                if ($item) {
                    $item->itemName = $_POST['itemName'];
                    $item->itemCusine = $_POST['itemCusine'];
                    $item->itemDietary = $_POST['itemDietary'];
                    $item->itemService = $_POST['itemService'];
                    $item->itemPrice = $_POST['itemPrice'];

                    if ($_FILES['itemImage']['size'] > 0) {
                        $itemImage = file_get_contents($_FILES['itemImage']['tmp_name']);
                        $item->itemImage = $itemImage;
                    }

                    $item->updateItem();
                    echo "Item successfully updated.";

                    echo '<meta http-equiv="refresh" content="2;url=menu-manage.php">';
                } else {
                    echo "Item not found.";
                }
            } else {
                echo "Item ID not provided.";
            }
        }
    ?>
</body>
</html>
