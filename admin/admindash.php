<?php
session_start();

if (isset($_SESSION['uid'])) {
    // echo $_SESSION['uid'];

} else {
    header('Location: ../login.php');
}
// include("header.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div id="ad-dash">
        <h1>Welcome to Admin Dashboard</h1>
        <h4 id="logout"><a href="logout.php">Logout</h4>
        <h4 id="back"><a href="admindash.php"></a></h4>
    </div>
<div>
    <table id="dash-table">
        <tr>
            <td style="padding-left: 10px;">
                1.
            </td>
            <td style="padding-left: 10px;">
                <a href="addstudent.php">Add Student Details</a>
            </td>
        </tr>
        <tr>
            <td style="padding-left: 10px;">
                2.
            </td>
            <td style="padding-left: 10px;">
                <a href="updatestudent.php">Update Student Details</a>
            </td>
        </tr>
        <tr>
            <td style="padding-left: 10px;">
                3.
            </td>
            <td style="padding-left: 10px;">
                <a href="../index.php">Back to Login Page</a>
            </td>
        </tr>
    </table>
</div>
</body>

</html>