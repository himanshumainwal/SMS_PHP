<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>SignUp Page</title>
</head>

<body>
    <h1 id="login-heading">Admin SignUp</h1>
    <form action="signup.php" method="post">
        <table>
            <tr>
                <td>Full Name :</td>
                <td><input type="text" name="name" id="name" required></td>
            </tr>
            <tr>
                <td>Username :</td>
                <td><input type="text" name="uname" id="uname" required></td>
            </tr>
            <tr>
                <td>Password :</td>
                <td><input type="password" name="pass" id="pass" required></td>
            </tr>
            <tr>
                <td>Confirm Password :</td>
                <td><input type="password" name="confPass" id="confPass" required></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" id="submit" name="signup" value="SignUp"></td>
            </tr>
        </table>
    </form>

    <?php

    if (isset($_POST['signup'])) {
        $name = $_POST['name'];
        $uname = $_POST['uname'];
        $pass = $_POST['pass'];
        $confPass = $_POST['confPass'];
        require("dbconn.php");

        if ($pass != $confPass) {
            echo "<script>alert('Passwords do not match!!');</script>";
        } else {
            $query = "INSERT INTO signup (name,username,pass,confPass) VALUES('$name','$uname','$pass','$confPass')";
            $result = mysqli_query($conn, $query);
            // echo "<script>window.location.href='login.php'</script>";
            if ($result) {
                echo "<script>alert('Registered Successfully!!');</script>";
                echo "<script>window.location.href='login.php';</script>";
            } else {
                echo "<script>alert('Registration Failed!!');</script>";
                echo "<script>window.location.href='signup.php';</script>";
            }
        }
    } else {
        // echo "<script>window.location.href='signup.php';</script>";
    }

    ?>
</body>

</html>