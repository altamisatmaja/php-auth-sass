<?php
    include ('../service/conn.php');
    $sql = 'SELECT id, name, username, password FROM users';
    $result = $conn->query($sql);

    session_start();

    $formUsername = $_GET['name'];
    $formPassword = $_GET['password'];

    if (isset($_SESSION['username'])) {
        echo 'Welcome ' . $_SESSION['name'];
    } else {
        while ($row = $result->fetch_assoc()) {
            if ($row['username'] == $formUsername && $row['password'] == $formPassword) {
                $_SESSION['username'] = $formUsername;
                $_SESSION['name'] = $row['name'];

                if (isset($_GET['check'])) {
                    setCookie('username', $formUsername);
                    setCookie('password', $formPassword);
                }

                header('Location: /php-auth/views/pages/dashboard/dashboard.php');
                return;
            }
        }
        header('Location: /php-auth/views/pages/auth/sign-in.php');
        return;
    }
