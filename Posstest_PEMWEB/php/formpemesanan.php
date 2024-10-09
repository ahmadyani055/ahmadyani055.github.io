<?php
$servername = "localhost"; // Biasanya localhost
$username = "root"; // Ganti dengan username MySQL Anda
$password = ""; // Ganti dengan password MySQL Anda
$dbname = "posttest_pemweb"; // Ganti dengan nama database Anda

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Mendapatkan data dari form
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$produk = $_POST['produk'];
$jumlah = $_POST['jumlah'];
$pembayaran = $_POST['pembayaran'];

// Menyimpan data ke database
$sql = "INSERT INTO pemesanan (nama, alamat, produk, jumlah, pembayaran) VALUES ('$nama', '$alamat', '$produk', '$jumlah', '$pembayaran')";

if ($conn->query($sql) === TRUE) {
    echo "Pesanan berhasil dikirim!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
