<?php

if (isset($_GET['del'])) {
    require '../includes/connection.php';

    $id = $_GET['del'];

    $sql = "DELETE FROM student_user WHERE id=$id";
    if ($conn->query($sql)) {
        header('location: dashboard.php');
    }
}