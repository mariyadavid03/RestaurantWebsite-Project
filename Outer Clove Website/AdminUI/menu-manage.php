<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Menu</title>
    <link rel="stylesheet" href="CSS/menu-manage.css">
</head>
<body>
    <header>
        <?php include 'admin-header.php'; ?>
    </header>
    <main>
        <h2>Manage Menu 
        <?php
        //Checking the user types stored in session
        if ($_SESSION['user_type'] == 'Admin') {
            echo '<button type="submit" name="btnAdd" class="btnAdd">
                    <a href="menu-add.php" class="btnAdd">Add Item +</a>
                </button>';
        }
        ?>
        </h2>
        <!--- Displaying Menu in a Table -->
        <table>
            <thead>
                <tr>
                    <th>Item Name</th>
                    <th>Cuisine Type</th>
                    <th>Dietary</th>
                    <th>Service Type</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th> - </th>
                </tr>
            </thead>
            <tbody>
                <?php
                include("../PHP/item.php");

                if ($_SERVER["REQUEST_METHOD"] == "POST") {

                    //Process for the delete button
                    if (isset($_POST['btnDelete'])) {
                        $itemId = isset($_POST['itemId']) ? $_POST['itemId'] : null;

                        if ($itemId) {
                            $item = new Item();
                            $item->deleteItem($itemId);
                        }
                    }
                }

                // Display the items
                echo '<form method="post">';
                $items = Item::getItem();

                foreach ($items as $item) {
                    echo '<tr>';
                    echo '<td>' . $item->itemName . '</td>';
                    echo '<td>' . $item->itemCusine . '</td>';
                    echo '<td>' . $item->itemDietary . '</td>';
                    echo '<td>' . $item->itemService . '</td>';
                    echo '<td>Rs. ' . $item->itemPrice . '</td>';
                    echo '<td><img src="../' . $item->itemImage . '" alt="Item Image" style="max-width: 100px;"></td>';
                    echo '<td>';
                    echo '<div class="btn-container">';
                    
                    //Showing edit, delete button for Admin
                    if ($_SESSION['user_type'] == 'Admin') {
                        echo '<form method="post" style="display: inline;">';
                        echo '<input type="hidden" name="itemId" value="' . $item->itemId . '">';
                        echo '<button type="submit" name="btnEdit" class="btnEdit">
                                <a href="menu-edit.php?itemId=' . $item->itemId . '" class="btnEdit">Edit</a>
                            </button>';
                        echo '</form>';
                        
                        echo '<form method="post" style="display: inline;">';
                        echo '<input type="hidden" name="itemId" value="' . $item->itemId . '">';
                        echo '<button type="submit" name="btnDelete" class="btnDelete">Delete</button>';
                        echo '</form>';

                    } elseif ($_SESSION['user_type'] == 'Staff') {
                        //Showing only edit button for Staff
                        echo '<form method="post" style="display: inline;">';
                        echo '<input type="hidden" name="itemId" value="' . $item->itemId . '">';
                        echo '<button type="submit" name="btnEdit" class="btnEdit">
                                <a href="menu-edit.php?itemId=' . $item->itemId . '" class="btnEdit">Edit</a>
                            </button>';
                        echo '</form>';
                    }
                    
                    echo '</div>';                    
                    echo '</td>';
                    echo '</tr>';
                }
                echo '</form>';
                ?>
                
            </tbody>
        </table>
    </main>
</body>
</html>
