<?php
include 'PHP/item.php';
include 'header.php';

//Checking form submission

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $item = new Item();
    $feedbackId = $item->addFeedback($name, $email, $subject, $message);
    
    //Checking if the submission is sucessful
    if ($feedbackId) {
        $_SESSION['feedback_added'] = true;

    } else {
        echo "Failed to submit feedback";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="CSS/contact.css">
</head>

<body>
    <header>
        <?php include 'header.php'; ?>
    </header>

    <main>
        <form method="post">
            <h2>Contact Us</h2>
            <?php
            //Sucess message displaying and resetting session used
            if (isset($_SESSION['feedback_added'])) {
                echo '<p class="feedback-message"><center>Thank you for your feedback!</center></p>';
                unset($_SESSION['feedback_added']);
            }
            ?>

            <!-- Feedback Form -->
            <label for="name">Name</label>
            <input type="text" name="name" required>

            <label for="email">Email</label>
            <input type="email" name="email" required>

            <label for="subject">Subject</label>
            <select name="subject" required>
                <option value="general">General Inquiry</option>
                <option value="feedback">Feedback</option>
                <option value="complaint">Complaint</option>
                <option value="suggestion">Suggestion</option>
                <option value="technical-issue">Technical Issue</option>
                <option value="praise">Praise</option>
            </select>

            <label for="message">Message</label>
            <textarea name="message" rows="4" required></textarea>
            <button type="submit" class="btnSubmit">Submit</button>
        </form>
    </main>
    <footer>
        <?php include 'footer.php'; ?>
    </footer>
</body>

</html>
