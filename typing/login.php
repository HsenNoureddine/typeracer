<?php

    session_start();
    function RemoveSpecialChar($str) 
    {
        $res = str_replace( array( '\'', '"',
        ',' , ';', '<', '>' ), ' ', $str);
        $str = trim($str);
        return $res;
    }
    //$conn = mysqli_connect(insert connection data);
    if(isset($_POST["login"])){
        $Username = $_POST["username"];
        $Username = mysqli_real_escape_string($conn,$Username);
        // $Username = RemoveSpecialChar($Username);

        $Pass = $_POST["password"];
        $Pass = mysqli_real_escape_string($conn,$Pass);
        // $Pass = RemoveSpecialChar($Pass);

        $select = mysqli_query($conn," SELECT * FROM tb_Users WHERE Username = '$Username' AND Password = '$Pass' ") or die( mysqli_error($conn));
        $row = mysqli_fetch_array($select);
        if(is_array($row))
        {
            $_SESSION["Username"] = $row["Username"];
            $_SESSION["Password"] = $row["Password"];
        }
        else{
            echo "<script>";
            echo 'alert ("wrong username or password")';
            echo "</script>";
        }
        
    }
    if(isset($_SESSION["Username"]))
    {
        header("Location:index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="loginstyle.css">
</head>
<body>
    <div class="container">
        <div class="box">
            <h1>Login</h1>
            <form action="login.php" method="post">
                <input type="text" name="username" placeholder="Username">
                <input type="password" name="password" placeholder="Password">
                <input type="submit" name="login" value="Login">
            </form>
        </div>
    </div>
</body>

</html>