<?php
    session_start();

    if (!isset($_SESSION['id']) || (trim($_SESSION['id']) == '')) {
        header('location: ../index.php');
        exit();
    }
    
    require "../includes/connection.php";

    $userId = $_SESSION['id'];
    $sql = "SELECT * FROM customer_acc_tbl WHERE cust_id=$userId";
    $result = $conn->query($sql)->fetch_assoc();

    $c_fname = $result['c_fname'];
    $c_lname = $result['c_lname'];
    $c_email = $result['c_email'];

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Document</title>
    </head>
    <body>
        <main class="container">
            <aside>
                <ul>
                    <li>
                        <a href="">Link</a>
                    </li>
                </ul>
            </aside>
        </main>
    </body>
</html>
