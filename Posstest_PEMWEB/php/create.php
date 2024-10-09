<?php
include 'konek.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $produk = $_POST['produk'];
    $jumlah = $_POST['jumlah'];
    $pembayaran = $_POST['pembayaran'];

    $sql = "INSERT INTO pemesanan (nama, alamat, produk, jumlah, pembayaran) 
            VALUES ('$nama', '$alamat', '$produk', $jumlah, '$pembayaran')";

    if ($conn->query($sql) === TRUE) {
        echo "Pesanan berhasil dikirim! <a href='read.php'>Lihat Data Pemesanan</a>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
