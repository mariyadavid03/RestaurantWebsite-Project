<?php
    include 'PHP/conn.php';
    $search = null;

    // Checking if the form has been submitted
    if (isset($_POST['submitted'])) {

        //Checkig if the search button was pressed
        if (isset($_POST['search'])) {
            $search = $_POST['search'];
        } else {
            $search = null;
        }

        try {
            //SQL querys to select from the table
            $conn = Conn::getConnection();
            $sql = "SELECT * FROM facilities WHERE f_name LIKE :search";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':search', '%' . $search . '%', PDO::PARAM_STR);
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        
        //When no search has been submitted (normal view)
        try {
            $conn = Conn::getConnection();
            $sql = "SELECT * FROM facilities";
            $result = $conn->query($sql);
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/facilities.css">
    <title>Our Facilities</title>
</head>

<body>
    <header>
    <?php include 'header.php'; ?>
    </header>

    <div class="facility-heading">
        <img src="images/about-heading.jpg" alt="Facilities Heading" class="heading-img">
        <h1 class="heading-text">Our Facilities</h1>
    </div>
    <main>
        <!--Search Button-->
        <div class="facility-search">
            <form method="post" action="" class="search-form">
                <input type="text" name="search" class="search-input" placeholder="Search facilities">
                <button type="submit" class="search-button">Search</button>
                <input type="hidden" name="submitted" value="1">
            </form>
        </div>

        <!--Displaying Facilities-->
        <div class="facility-content">
        <?php
            if (isset($result)) {
                foreach ($result as $row) {
                    echo '<div class="facility">';
                    echo '<img src="' . $row['f_img'] . '" class="facility-img">';
                    echo '<div class="facility-details">';
                    echo '<label class="facility-name">' . $row['f_name'] . '</label>';
                    echo '<p class="facility-desc">' . $row['f_desc'] . '</p>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo '<p>No results found.</p>';
            }
        ?>
        </div>
    </main>

    <footer>
        <?php include 'footer.php'; ?>
    </footer>

</body>
</html>
