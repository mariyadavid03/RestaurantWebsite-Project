<?php
    include 'PHP/item.php';
    $menuItems = Item::getItem();

    //Checking if set & setting default values
    $cuisineFilter = isset($_POST['cuisineFilter']) ? $_POST['cuisineFilter'] : 'All Cusines';
    $dietaryFilter = isset($_POST['dietaryFilter']) ? $_POST['dietaryFilter'] : 'None';
    $serviceFilter = isset($_POST['serviceFilter']) ? $_POST['serviceFilter'] : 'All Service'; 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/menu.css">
    <title>Menu</title>
</head>
<body>
    <header>
        <?php include 'header.php'; ?>
    </header>

    <main class="menu-container">

        <!--Filter Form -->
        <form method="post" class="filter-form" action="
        <?php echo $_SERVER['PHP_SELF']; ?>">
            <label class="filterHeading" for="cuisineFilter">Cuisine:</label>
            <select class="cuisineFilter" name="cuisineFilter" required>
                <option value="All Cusines">All</option>
                <option value="Indian">Indian</option>
                <option value="Thai">Thai</option>
                <option value="Italian">Italian</option>
            </select><br>

            <label class="filterHeading" for="dietaryFilter">Dietary:</label>
            <select class="dietaryFilter" name="dietaryFilter" required>
                <option value="None">None</option>
                <option value="Vegan">Vegan</option>
                <option value="Gluten Free">Gluten Free</option>
            </select><br>

            <label class="filterHeading" for="serviceFilter">Service:</label>
            <select name="serviceFilter" class="serviceFilter">
                <option value="All Service">All</option>
                <option value="Appetizer">Appetizer</option>
                <option value="Main">Main</option>
                <option value="Dessert">Dessert</option>
            </select><br>

            <button type="submit" class="filterButton">Apply Filters</button>
        </form>

        <!--Displaying filtered items -->
        <div class="menu-items">
        <?php
            $itemsDisplayed = false; 

            foreach ($menuItems as $item) {
                if (
                    // Checking if items matches selected filters
                    ($cuisineFilter == '' || $cuisineFilter == 'All Cusines' || strcasecmp(trim($item->itemCusine), trim($cuisineFilter)) == 0) &&
                    ($dietaryFilter == '' || $dietaryFilter == 'None' || $item->itemDietary == $dietaryFilter) &&
                    ($serviceFilter == '' || $serviceFilter == 'All Service' || $item->itemService == $serviceFilter)
                ) {
                    $itemsDisplayed = true;

                    // Display menu items details
                    echo '<div class="menu-item">';
                    echo '<img class="item-img" src="' . $item->itemImage . '">';
                    echo '<div class="item-details">';
                    echo '<span class="item-name">' . $item->itemName . '</span>';
                    echo '<span class="item-price">Rs. ' . $item->itemPrice . '</span>';
                    echo '<div class="menu-properties">';
                    echo '<span class="property">' . $item->itemCusine . '</span> <br>';
                    echo '<span class="property">' . $item->itemDietary . '</span> <br>';
                    echo '<span class="property">' . $item->itemService . '</span>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            }

            if (!$itemsDisplayed) {
                echo '<p>No items found.</p>';
            }
        ?>
        </div>
    </main>
    <footer>
        <?php include 'footer.php'; ?>
    </footer>
</body>
</html>
