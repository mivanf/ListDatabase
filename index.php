<?php
    include 'header.php';
    include 'db.php';
?>

<div class="content">
    <?php
        if (isset($_SESSION['username'])) {
            echo "<h2>Selamat datang, " . $_SESSION['username'] . "!</h2>";
            echo '<a href="list_ponsel.php">Lihat Daftar Ponsel</a>';
        } else {
            header("Location: login.php");
        }
    ?>
</div>

<?php include 'footer.php'; ?>