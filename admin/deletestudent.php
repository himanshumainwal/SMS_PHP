<?php

if (isset($_GET['sid'])) {

    $id = $_GET['sid'];
    // echo $id;
    // die();

    include("../dbconn.php");
    echo $query = "DELETE FROM student WHERE id = '$id'";
    $result = mysqli_query($conn, $query);

    if ($result === true) {
        echo "<script>confirm('Are You Sure ?');</script>";
        echo "<script>alert('Student Deleted Successfully');</script>";
        header("Location: updatestudent.php");
    }else{
        echo mysqli_error($conn);
    }
}
