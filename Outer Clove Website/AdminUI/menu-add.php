<?php
    require_once("../PHP/item.php");
    require_once("../PHP/conn.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/menu-add.css">
    <title>Add Item</title>
</head>
<body>

    <header>
        <?php include 'admin-header.php'; ?>
    </header>

    <main class="add-item-container">
        <h2>Add Item</h2>

        <!-- Menu Adding Form -->     
        <form method="post" enctype="multipart/form-data">
            <label for="itemName">Name:</label>
            <input type="text" name="itemName" required><br>

            <label for="itemCusine">Cuisine:</label>
            <select name="itemCusine" required>
                <option value="Indian">Indian</option>
                <option value="Thai">Thai</option>
                <option value="Italian">Italian</option>
            </select><br>

            <label for="itemDietary">Dietary:</label>
            <select name="itemDietary" required>
                <option value="Vegan">Vegan</option>
                <option value="Gluten Free">Gluten Free</option>
                <option value="None" selected>None</option>
            </select><br>

            <label for="itemService">Service Type:</label>
            <select name="itemService" required>
                <option value="Main">Main</option>
                <option value="Appetizer">Appetizer</option>
                <option value="Dessert">Dessert</option>
            </select><br>

            <label for="itemPrice">Price(Rs.):</label>
            <input type="number" name="itemPrice" required><br>

            <label>Image:</label>
            <input type="file" name="itemImage" required><br>

            <input type="submit" value="Add Item" name="btnAdd">

            <?php
                //Checking button click
                if(isset($_POST["btnAdd"])){

                    //new item object to access the variables
                    $item = new Item;
                    $item->itemName = $_POST["itemName"];
                    $item->itemCusine = $_POST["itemCusine"];
                    $item->itemDietary = $_POST["itemDietary"];
                    $item->itemService = $_POST["itemService"];
                    $item->itemPrice = $_POST["itemPrice"];
                
                    //Hadleing the image uploads
                    try {
                        $id = $item->addItem();
                        $item->itemId = $id;
                        $image = $_FILES["itemImage"]["name"];
                        $info = new SplFileInfo($image);
                        $newName = "../images/MenuImages/" .$id.'.'. $info->getExtension();
                        move_uploaded_file($_FILES["itemImage"]["tmp_name"],$newName);
                        $item->itemImage = $newName; 
                        $item->addImage();
                    } catch (Exception $e) {
                        echo $e->getMessage();
                    }
                }
                
            ?>
        </form>
    </main>
</body>
</html>
