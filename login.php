<?php
session_start();
if(isset($_SESSION['uid'])){
    header('Location: admin/admindash.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Login Page</title>
    <style>
        h5 a{
            text-decoration: none;
            color: black;
        }
        h5 a:hover{
            text-decoration: underline;
        }
        h5{
            padding: 7px 10px;
        }

    </style>
</head>

<body>
    <h5><a href="index.php" id="login">Back to Home Page</a></h5>

    <h1 id="login-heading">Admin Login</h1>
    <form action="login.php" method="post">
        <table>
            <tr>
                <td>Username :</td>
                <td><input type="text" name="uname" required></td>
            </tr>
            <tr>
                <td>Password :</td>
                <td><input type="password" name="pass" required></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" id="submit" name="login" value="Login"></td>
            </tr>
        </table>
    </form>
</body>

</html>
<?php  
if(isset($_POST['login'])){
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];

    include ('dbconn.php');

    $query = "SELECT * FROM signup WHERE username = '$uname' AND pass = '$pass'";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    if(mysqli_num_rows($result)>0){
        // echo "<script>alert('Login Successfull');</script>";
        $row = mysqli_fetch_assoc($result);
        $id = $row['id'];
        session_start();
        $_SESSION['uid'] = $id;
        echo "<script>window.location.href='admin/admindash.php';</script>";
    }else{
        echo "<script>alert('Username and Password not match!!');</script>";
        echo "<script>window.location.href='login.php';</script>";
    }

}else{
    // echo "<script>alert('Please fill all fields!!');</script>"; 
}
?>