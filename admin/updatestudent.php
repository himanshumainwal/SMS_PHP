<?php
session_start();

if (!isset($_SESSION['uid'])) {
    // echo $_SESSION['uid'];
    header('Location: ../login.php');
}
include("header.php");
?>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="update-student">

    <tr>
        <th class=" ">Standerd :</th>
        <td>
            <input type="number" style="color: black;" name="standerd" placeholder="Enter Standerd" required="required" />
        </td>

        <th class=" ">Student Name :</th>
        <td>
            <input type="text"  style="color: black;" name="stname" placeholder="Enter Student Name" required="required" />
        </td>

        <td colspan="2"><input type="submit" name="submit" id="submit" value="Search" /> </td>
    </tr>

</form>


<table align="center" border="1" style="width:87%; border-radius: 5px;" id="update-admin">
    <tr style="background-color: #000; color: #fff;">
        <th>No.</th>
        <th>Name</th>
        <th>Roll No.</th>
        <th>Image</th>
        <th>Edit</th>
    </tr>
    <?php 
    if(isset($_POST['submit'])){
        $standerd = $_POST['standerd'];
        $stname = $_POST['stname'];

        include ("../dbconn.php");
        $query = "SELECT * FROM student WHERE standerd = '$standerd' AND name LIKE '%$stname%'";
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        $count = 0;
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)){
                $count++;
                echo "<tr>";
                echo "<td style='padding:4px 10px;'>$count</td>";
                echo "<td style='padding:4px 10px;'>$row[name]</td>";
                echo "<td style='padding:4px 10px;'>$row[rollno]</td>";
                echo "<td style='padding:4px 10px;' width='170px'><img src='../images/$row[image]' alt='Image not avaible' width='100' height='80'></td>";
                echo "<td style='padding:4px 10px;'  width='150px'>
                    <a href='updatestdform.php?sid=$row[id]' id='submit' style='text-decoration: none;'>Edit</a>
                    <a href='deletestudent.php?sid=$row[id]' id='dlt' style='text-decoration: none; '>Delete</a></td>";
            }
        }else{
            echo "<script>alert('Student not found');</script>";
        }
    }
    ?>
</table>

</body>

</html>