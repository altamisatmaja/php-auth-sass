<html>
        <style>
            .menu {
                    text-align: center;
                    margin: auto;
                    width: 300px;
                    border: 1px solid black;
                    padding: 20px;
                }
        </style>
    <body>
        <?php
            include("../service/conn.php");
            $sql = "SELECT id, name, username, password FROM users";
            $result = $conn->query($sql); 
            
            session_start();
            
            $formUsername = $_GET['name'];
            $formPassword = $_GET['pwd'];

            if (isset($_SESSION['username'])){
                    echo "Welcome ".$_SESSION['name'];
            } else {
                while($row = $result->fetch_assoc()) {
                    if ($row['username'] == $formUsername && $row['password'] == $formPassword){
                        $_SESSION['username'] = $formUsername;
                        $_SESSION['name'] = $row['name'];
    
                        if(isset($_GET["check"])){
                            setCookie('username', $formUsername);
                            setCookie('password', $formPassword);
                        }

                        echo "<script>location.href='dashboard.php'</script>";
                        return;
                    }
                }
                echo "Username atau password anda salah<br>";
                echo "<a href='login.php'>login</a>";
            }
        ?>

        <div class="menu">
            <a href="home.php">Home</a><br>
            <a href="products.php">Products</a><br>
            <a href="logout.php">logout</a>
        </div>

    </body>
</html>