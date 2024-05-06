<html>
    <head>
        <style>
            .menu {
                    text-align: center;
                    margin: auto;
                    width: 300px;
                    border: 1px solid black;
                    padding: 20px;
                }
        </style>
    </head>
    <body>
        <div class="menu">
            <a href="home.php">Home</a><br>
            <a href="products.php">Products</a><br>
            <a href="logout.php">logout</a>
        </div>
    <?php
        session_start();
        
        if (isset($_SESSION["username"])) {
            echo "<h1>This is product page.</h1><br>";
            echo "This page contains product list";
        } else {
            echo "<script>location.href='login.php'</script>";
        }
    ?>
    </body>
</html>