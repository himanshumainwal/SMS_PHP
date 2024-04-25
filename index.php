<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
#heading{
    font-size: 2rem;
    font-weight: 800;
}
#displat-table th, #displat-table td{
    border: 1px solid black;
    padding: 10px;
    border-radius: 10px;
}
#displat-table td{
    font-weight: 500;
}
#signup {
    /* text-align: left; */
    position: absolute;
    left: 14px;
    color: #114c6294;
    top: 3px;
    padding: 6px 8px 6px 0;
}

#login{
    color: #114c6294;
    position: absolute;
    right: 14px;
    top: 3px;
    padding: 6px 8px 6px 0;
    }
    


    </style>
</head>

<body>
    <h3><a href="login.php" id="login">Admin Login</a></h3>
    <h3><a href="signup.php" id="signup">Sign Up</a></h3>
    <h1 id="index-heading">Welcome to Student Management System</h1>

    <form action="index.php" method="post">
        <table>
            <tr>
                <td colspan="2" id="sub-heading">Student Information</td>
            </tr>
            <tr>
                <td>Choose Standerd</td>
                <td>
                    <select name="std" id="" required>
                        <option value="1">1st</option>
                        <option value="2">2nd</option>
                        <option value="3">3rd</option>
                        <option value="4">4th</option>
                        <option value="5">5th</option>
                        <option value="6">6th</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Enter Rollno</td>
                <td><input type="text" name="rollno" required></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" name="submit" id="submit" value="Show Info"></td>
            </tr>
        </table>
    </form>
    <?php

    if (isset($_POST['submit'])) {
        $std = $_POST['std'];
        $rollno = $_POST['rollno'];

        require("dbconn.php");

        $sql = "SELECT * FROM student WHERE standerd='$std' AND rollno='$rollno'";
        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
    ?>

    <table id="displat-table" style="width: 70%; text-align:left; border: 2px solid black">
        <tr>
            <th colspan="3" align="center" id="heading">Student Details</th>
        </tr>
        <tr>
            <td rowspan="5"> <img width="100%" height="100%" src="images/<?php echo $row['image'];?>"/> </td>
            <th>1. Roll No</th>
            <td><?php echo $row['rollno'];?></td>
        </tr>
        <tr>
            <th>2. Full Name</th>
            <td><?php echo $row['name'];?></td>
        </tr>
        <tr>
            <th>3. City</th>
            <td><?php echo $row['city'];?></td>
        </tr>
        <tr>
            <th>4. Parents Contact No</th>
            <td><?php echo $row['pcont'];?></td>
        </tr>
        <tr>
            <th>5. Standred</th>
            <td><?php echo $row['standerd'];?></td>
        </tr>


    <?php
        } else {
            echo "<script>alert('Rollno and Standerd not match!!');</script>";
            // echo "<script>window.location.href='index.php';</script>";
        }
    }



    ?>

</body>

</html>