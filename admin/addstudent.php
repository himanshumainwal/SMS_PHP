<?php
session_start();

if (!isset($_SESSION['uid'])) {
    // echo $_SESSION['uid'];
    header('Location: ../login.php');
}
include("header.php");
?>


<form method="post" action="addstudent.php" enctype="multipart/form-data">
    <table>
        <tr>
            <td>Roll No :</td>
            <td><input type="text" name="rollno" placeholder="Enter Roll No" required></td>
        </tr>
        <tr>
            <td>Full Name :</td>
            <td><input type="text" name="name" placeholder="Enter Full Name" required></td>
        </tr>
        <tr>
            <td>City :</td>
            <td><input type="text" name="city" placeholder="Enter City" required></td>
        </tr>
        <tr>
            <td>Parents Contact No :</td>
            <td><input type="number" name="pcontact" placeholder="Enter Parents Contact No" required></td>
        </tr>
        <tr>
            <td>Standerd :</td>
            <td><input type="text" name="standerd" placeholder="Enter Standerd" required></td>
        </tr>
        <tr>
            <td>Image :</td>
            <td><input type="file" name="image"></td>
        </tr>
        <tr>
            <td colspan="2" align="center"><input type="submit" name="submit" id="submit" value="Submit"></td>
        </tr>

    </table>
</form>

</body>

</html>

<?php
if (isset($_POST['submit'])) {
    require("../dbconn.php");

    $rollno = $_POST['rollno'];
    $name = $_POST['name'];
    $city = $_POST['city'];
    $pcontact = $_POST['pcontact'];
    $standerd = $_POST['standerd'];
    // $image = $_FILES['image'];
    $image_name = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    
    // if (is_uploaded_file($image_tmp && $_FILES["image"]["error"] === 0)) {
        move_uploaded_file($image_tmp, "../images/" . $image_name);
    // }

    $query = "INSERT INTO student(rollno, name, city, pcont, standerd, image) values('$rollno', '$name', '$city', '$pcontact', '$standerd', '$image_name')";
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Daetails Added Successfully');</script>";
    } else {
        echo mysqli_error($conn);
    }
}

?>