<?php
require 'do2.php';
if(isset($_POST["submit"])){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];

    
    $duplicate = mysqli_query($conn, "SELECT * FROM do1 WHERE username = '$username' OR email = '$email'");

    if(mysqli_num_rows($duplicate) > 0){
        echo "<script> alert('Username or Email already taken');</script>";

    }else{
        if($password == $confirmpassword){
            $query = "INSERT INTO do1 (name, email, username, password) VALUES ('$name', '$email', '$username', '$password')";

            if(mysqli_query($conn, $query)){
                echo "<script> alert('Registration Successfull');</script>";
            }else{
                echo "<secript> alert('Faild to register user: ". mysqli_error($conn) . "');</script>";
            }
        
        }
         else{
                echo "<script>alert('Password does not match');</script>";
           }
     }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>
    <form action="" method="post">
        <h1>Register</h1>
        <label>Name</label>
        <input type="text" name="name" ><br>
        <label>Email</label>
        <input type="text" name="email" > <br>
        <label>Username</label>
        <input type="text" name="username" ><br>
         <label>Password</label>
        <input type="text" name="password" > <br>
         <label>Confirm Password</label>
        <input type="text" name="confirmpassword" ><br>
        <button name="submit">Submit</button>
    </form>
</body>
</html>
