<?php
session_start();
if(isset($_SESSION['username'])) {
    header("Location: products.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <style>
        .menu {
            text-align: center;
            margin: auto;
            width: 300px;
            border: 1px solid black;
            padding: 20px;
        }
        form {
            margin: auto;
            margin-top: 50px;
            border: 1px solid black;
            border-radius: 5px;
            padding: 25px;
            width: 400px;
        }
    </style>
</head>
<body>
    <div class="menu">
        <a href="home.php">Home</a><br>
        <a href="products.php">Products</a><br>
        <a href="logout.php">logout</a>
    </div>
    <form action="server.php" method="get">
        <label for="name">Name : </label>
        <input type="text" name="name" value=<?php if(isset($_COOKIE['username'])) echo $_COOKIE['username'] ?>>
        <br><br>
        <label for="pwd">Password : </label>
        <input type="password" name="pwd" value=<?php if(isset($_COOKIE['password'])) echo $_COOKIE['password'] ?>>
        <br><br>
        <input type="checkbox" name="check">Remember me
        <br><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>