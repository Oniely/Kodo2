<?php

$dbHost = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbDatabase = "test_db";

$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbDatabase);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evaluation Form</title>

    <link rel="stylesheet" href="styles.css">
    <script src="app.js" defer></script>
</head>

<body>
    <a id="back" href="../admin/dashboard.php">Back to Dashboard</a>
    <div class="form-container">
        <a id="result" href="./result.php">Check Responses</a>
        <h1>Evaluation Form</h1>
        <form method="POST" onsubmit="return validateForm()">
            <label for="email">Email Address:</label>
            <div class="rating">
                <input name="email" id="email" type="text" placeholder="example@gmail.com" >
            </div>
            <label for="question1">Question 1: How would you rate the overall user interface and ease of navigation of the software?</label>
            <div class="rating">
                <input type="radio" id="bad1" name="rating1" value="bad" >
                <label for="bad1">Bad</label>
                <input type="radio" id="good1" name="rating1" value="good" >
                <label for="good1">Good</label>
                <input type="radio" id="great1" name="rating1" value="great" >
                <label for="great1">Great</label>
            </div>

            <label for="question2">Question 2: How effectively does the software meet its intended purpose or solve the targeted problem?</label>
            <div class="rating">
                <input type="radio" id="bad2" name="rating2" value="bad" >
                <label for="bad2">Bad</label>
                <input type="radio" id="good2" name="rating2" value="good" >
                <label for="good2">Good</label>
                <input type="radio" id="great2" name="rating2" value="great" >
                <label for="great2">Great</label>
            </div>

            <label for="question3">Question 3: How would you rate the responsiveness and speed of the software in performing tasks?</label>
            <div class="rating">
                <input type="radio" id="bad3" name="rating3" value="bad" >
                <label for="bad3">Bad</label>
                <input type="radio" id="good3" name="rating3" value="good" >
                <label for="good3">Good</label>
                <input type="radio" id="great3" name="rating3" value="great" >
                <label for="great3">Great</label>
            </div>
            <label for="question4">Question 4: How intuitive is the software in terms of understanding its features and functionalities without external help or documentation?</label>
            <div class="rating">
                <input type="radio" id="bad4" name="rating4" value="bad" >
                <label for="bad4">Bad</label>
                <input type="radio" id="good4" name="rating4" value="good" >
                <label for="good4">Good</label>
                <input type="radio" id="great4" name="rating4" value="great" >
                <label for="great4">Great</label>
            </div>
            <label for="question5">Question 5: How reliable and stable is the software in handling different tasks without crashing or encountering errors?</label>
            <div class="rating">
                <input type="radio" id="bad5" name="rating5" value="bad" >
                <label for="bad5">Bad</label>
                <input type="radio" id="good5" name="rating5" value="good" >
                <label for="good5">Good</label>
                <input type="radio" id="great5" name="rating5" value="great" >
                <label for="great5">Great</label>
            </div>
            <label for="question6">Question 6: How well does the software handle user input and provide appropriate feedback or error messages when necessary?</label>
            <div class="rating">
                <input type="radio" id="bad6" name="rating6" value="bad" >
                <label for="bad6">Bad</label>
                <input type="radio" id="good6" name="rating6" value="good" >
                <label for="good6">Good</label>
                <input type="radio" id="great6" name="rating6" value="great" >
                <label for="great6">Great</label>
            </div>
            <label for="question7">Question 7: How would you rate the overall design consistency, including fonts, colors, and layout, throughout the software?</label>
            <div class="rating">
                <input type="radio" id="bad7" name="rating7" value="bad" >
                <label for="bad7">Bad</label>
                <input type="radio" id="good7" name="rating7" value="good" >
                <label for="good7">Good</label>
                <input type="radio" id="great7" name="rating7" value="great" >
                <label for="great7">Great</label>
            </div>
            <label for="question8">Question 8: How effective is the software in terms of customization options and flexibility to adapt to different user needs?</label>
            <div class="rating">
                <input type="radio" id="bad8" name="rating8" value="bad" >
                <label for="bad8">Bad</label>
                <input type="radio" id="good8" name="rating8" value="good" >
                <label for="good8">Good</label>
                <input type="radio" id="great8" name="rating8" value="great" >
                <label for="great8">Great</label>
            </div>
            <label for="question9">Question 9: How responsive is the customer support or help system provided with the software, in case users encounter issues or need assistance?</label>
            <div class="rating">
                <input type="radio" id="bad9" name="rating9" value="bad" >
                <label for="bad9">Bad</label>
                <input type="radio" id="good9" name="rating9" value="good" >
                <label for="good9">Good</label>
                <input type="radio" id="great9" name="rating9" value="great" >
                <label for="great9">Great</label>
            </div>
            <label for="question10">Question 10: How would you rate the overall user experience of the software, considering factors such as aesthetics, usability, and satisfaction?</label>
            <div class="rating">
                <input type="radio" id="bad10" name="rating10" value="bad" >
                <label for="bad10">Bad</label>
                <input type="radio" id="good10" name="rating10" value="good" >
                <label for="good10">Good</label>
                <input type="radio" id="great10" name="rating10" value="great" >
                <label for="great10">Great</label>
            </div>

            <input type="submit" value="submit" class="button">

            <?php

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $email = $_POST['email'];
                $q1 = $_POST['rating1'];
                $q2 = $_POST['rating2'];
                $q3 = $_POST['rating3'];
                $q4 = $_POST['rating4'];
                $q5 = $_POST['rating5'];
                $q6 = $_POST['rating6'];
                $q7 = $_POST['rating7'];
                $q8 = $_POST['rating8'];
                $q9 = $_POST['rating9'];
                $q10 = $_POST['rating10'];

                $stmt = $conn->prepare("INSERT INTO `evaluation_tbl`(`id`, `email`, `q1`, `q2`, `q3`, `q4`, `q5`, `q6`, `q7`, `q8`, `q9`, `q10`) VALUES (DEFAULT, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("sssssssssss", $email, $q1, $q2, $q3, $q4, $q5, $q6, $q7, $q8, $q9, $q10);

                if ($stmt->execute()) {
                    echo "<script>
                        alert('Form Submitted Successfully!')
                        </script>";
                } else {
                    echo "<script>
                        alert('Error!')
                        </script>";
                }

                $stmt->close();
                $conn->close();
            }

            ?>
        </form>
    </div>
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
</body>

</html>