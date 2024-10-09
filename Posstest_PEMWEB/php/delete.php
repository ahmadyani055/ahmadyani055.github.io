<?php
include 'konek.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM pemesanan WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil dihapus! <a href='read.php'>Lihat Data Pemesanan</a>";
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>
