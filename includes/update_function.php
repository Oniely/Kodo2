<?php

if (isset($_POST["updateBtn"])) {
    $u_id = $id;
    $u_fname = $_POST['u_fname'];
    $u_lname = $_POST['u_lname'];
    $u_email = $_POST['u_email'];
    $u_password = $_POST['u_passw'];

    $sql = "UPDATE student_user SET stu_fname='$u_fname', stu_lname='$u_lname', stu_email='$u_email', stu_password='$u_password' WHERE id=$u_id";
    if ($conn->query($sql)) {
        header('location: ./dashboard.php');
    } else {
        die("ERROR");
    }
}

?>