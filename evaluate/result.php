<?php

$dbHost = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbDatabase = "test_db";

$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbDatabase);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM evaluation_tbl WHERE 1";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Table</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic" rel="stylesheet" />

    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
        }

        body {
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th,
        td {
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <a href="./index.php">Evaluation Form</a>
    <table>
        <tr>
            <th>Email</th>
            <th>Question 1</th>
            <th>Question 2</th>
            <th>Question 3</th>
            <th>Question 4</th>
            <th>Question 5</th>
            <th>Question 6</th>
            <th>Question 7</th>
            <th>Question 8</th>
            <th>Question 9</th>
            <th>Question 10</th>
        </tr>
        <?php

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) :
                $email = $row['email'];
                $q1 = $row['q1'];
                $q2 = $row['q2'];
                $q3 = $row['q3'];
                $q4 = $row['q4'];
                $q5 = $row['q5'];
                $q6 = $row['q6'];
                $q7 = $row['q7'];
                $q8 = $row['q8'];
                $q9 = $row['q9'];
                $q10 = $row['q10'];
        ?>
                <tr>
                    <td><?= $email ?></td>
                    <td><?= $q1 ?></td>
                    <td><?= $q2 ?></td>
                    <td><?= $q3 ?></td>
                    <td><?= $q4 ?></td>
                    <td><?= $q5 ?></td>
                    <td><?= $q6 ?></td>
                    <td><?= $q7 ?></td>
                    <td><?= $q8 ?></td>
                    <td><?= $q9 ?></td>
                    <td><?= $q10 ?></td>
                </tr>
        <?php
            endwhile;
        }

        ?>
    </table>
</body>

</html>