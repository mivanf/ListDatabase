<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Website</title>
    <style>
        .nav {
            background-color: #f2f2f2;
            padding: 10px;
            text-align: center;
        }
        .nav a {
            margin: 0 10px;
            text-decoration: none;
            color: #23AAF2;
        }
        .nav a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="nav">
        <a class="a" href="index.php">Home</a>
        <a class="a" href="list_ponsel.php">List Ponsel</a>
        <?php
        if (isset($_SESSION['username'])) {
            echo '<a class="a" href="logout.php">Logout</a>';
        } else {
            echo '<a href="login.php">Login</a>';
            echo '<a href="register.php">Register</a>';
        }
        ?>
    </div>