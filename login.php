<?php
    include 'header.php';
    include 'db.php';
?>

<div class="content">
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST['username'];
            $password = $_POST['password'];
        
            $sql = $conn->prepare("SELECT * FROM users WHERE username=?");
            $sql->bind_param("s", $username);
            $sql->execute();
            $result = $sql->get_result();
        
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                if (password_verify($password, $row['password'])) {
                    $_SESSION['username'] = $username;
                    header("Location: index.php");
                } else {
                    echo "Password salah!";
                }
            } else {
                echo "Username tidak ditemukan!";
            }
            
            $sql->close();
            $conn->close();
        }
    ?>

    <h2>Login</h2>
    <form method="post" action="">
        Username: <input type="text" name="username" required><br><br>
        Password: <input type="password" name="password" required><br><br>
        <input type="submit" value="Login">
    </form>
</div>

<?php include 'footer.php'; ?>