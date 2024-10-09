<?php
    include 'header.php';
    include 'db.php';

    if (!isset($_SESSION['username'])) {
        header("Location: login.php");
        exit();
    }

    $sql = "SELECT * FROM phones";
    $result = $conn->query($sql);
?>

<div class="content">
    <h2>Daftar Ponsel</h2>
    <ul>
        <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<li><a href='detail_ponsel.php?id=" . $row["id"] . "'>" . $row["brand"] . " " . $row["model"] . "</a></li>";
                }
            } else {
                echo "Tidak ada Ponsel.";
            }
        ?>
    </ul>
</div>

<?php
    $conn->close();
    include 'footer.php';
?>
