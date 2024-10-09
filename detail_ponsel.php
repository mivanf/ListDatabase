<?php
    include 'header.php';
    include 'db.php';

    if (!isset($_SESSION['username'])) {
        header("Location: login.php");
        exit();
    }
?>

<div class="content">
    <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        
            $sql = $conn->prepare("SELECT * FROM phones WHERE id = ?");
            $sql->bind_param("i", $id);
            $sql->execute();
            $result = $sql->get_result();
        
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
            } else {
                echo "Ponsel tidak ditemukan.";
                exit();
            }
        } else {
            echo "ID ponsel tidak diberikan.";
            exit();
        }
    ?>
    
    <h2>Detail Spesifikasi Ponsel</h2>
    <p>Brand: <?php echo $row["brand"]; ?></p>
    <p>Model: <?php echo $row["model"]; ?></p>
    <p>Display: <?php echo $row["display"]; ?></p>
    <p>Chipset: <?php echo $row["chipset"]; ?></p>
    <p>OS: <?php echo $row["os"]; ?></p>
    <p>Battery: <?php echo $row["battery"]; ?></p>
    <br>
    <a href="list_ponsel.php">Kembali ke Daftar Ponsel</a>
</div>

<?php
    $sql->close();
    $conn->close();
    include 'footer.php';
?>