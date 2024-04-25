<?php
session_start();

if (!isset($_SESSION['uid'])) {
    // echo $_SESSION['uid'];
    header('Location: ../login.php');
}
include("header.php");
?>
<?php

$id = $_GET['sid'];
// echo $id;
include("../dbconn.php");
$query = "SELECT * FROM student WHERE id = '$id'";
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    // print_r($row); 
    // print_r($row['image']);
    // echo $row['image'];
?>


    <!-- updatestdform.php -->
    <form method="post" action="" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Roll No :</td>
                <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                <td><input type="text" name="rollno" required value="<?php echo $row['rollno'] ?>"></td>
            </tr>
            <tr>
                <td>Full Name :</td>
                <td><input type="text" name="name" placeholder="Enter Full Name" required value="<?php echo $row['name'] ?>"></td>
            </tr>
            <tr>
                <td>City :</td>
                <td><input type="text" name="city" placeholder="Enter City" required value="<?php echo $row['city'] ?>"></td>
            </tr>
            <tr>
                <td>Parents Contact No :</td>
                <td><input type="number" name="pcontact" placeholder="Enter Parents Contact No" required value="<?php echo $row['pcont'] ?>"></td>
            </tr>
            <tr>
                <td>Standerd :</td>
                <td><input type="text" name="standerd" placeholder="Enter Standerd" required value="<?php echo $row['standerd'] ?>"></td>
            </tr>
            <tr>
                <td>Image :</td>
                <td>
                    <input type="file" name="image" value="../images/<?php echo $row['image']; ?>">
                    <img src="../images/<?php echo $row['image']; ?>" width="80" height="80">
                    <span class="" title="<?php echo $row['image'] ?>"><?php echo $row['image'] ?></span>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" name="submit" id="submit" value="Update"></td>
            </tr>

        </table>
    <?php
}
    ?>
    </form>

    <?php

    if (isset($_POST['submit'])) {
        $id = $_POST['id'];
        $rollno = $_POST['rollno'];
        $name = $_POST['name'];
        $city = $_POST['city'];
        $pcontact = $_POST['pcontact'];
        $standerd = $_POST['standerd'];
        $image_name = '';
        if (!empty($_FILES['image']['name']) && $_FILES['image']['size'] > 0) {
            if (is_uploaded_file($_FILES["image"]["tmp_name"]) && $_FILES["image"]["error"] === 0) {
                $image_name = $_FILES['image']['name'];
                $image_tmp = $_FILES['image']['tmp_name'];
                move_uploaded_file($image_tmp, "../images/" . $image_name);
            }
        } else {
            $image_name = $row['image'];
        }
        $query2 = "UPDATE student SET rollno = '$rollno', name = '$name', city = '$city', pcont = '$pcontact', standerd = '$standerd', image = '$image_name' WHERE id = '$id'";
        $result = mysqli_query($conn, $query2);
        if ($result === true) {
            echo "<script>alert('Record Updated Successfully');</script>";
            echo "<script>window.location.href='updatestudent.php';</script>";
        } else {
            echo mysqli_error($conn);
        }
    }



    ?>

    </body>

    </html>