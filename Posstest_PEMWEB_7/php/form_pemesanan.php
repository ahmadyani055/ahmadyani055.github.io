<?php
include 'konek.php';

$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "toko_sembako"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$produk = $_POST['produk'];
$jumlah = $_POST['jumlah'];
$pembayaran = $_POST['pembayaran'];

// Mengambil dan memproses file upload
$filename = $_FILES['file']['name'];
$timestamp = date('Y-m-d H.i.s'); // Mengganti : dengan . untuk nama file
$extension = pathinfo($filename, PATHINFO_EXTENSION);
$newFilename = $timestamp . '.' . $extension;

$targetDir = 'uploads/'; // Pastikan folder ini sudah ada
$targetFile = $targetDir . $newFilename;

// Memindahkan file yang diunggah
if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFile)) {
    echo "File berhasil diunggah.<br>";
} else {
    echo "Maaf, ada kesalahan saat mengunggah file.<br>";
    echo "Debug info: " . $_FILES['file']['tmp_name'] . " -> " . $targetFile; // Menampilkan informasi debug
}


// Menyimpan data pesanan ke database
$sql = "INSERT INTO pemesanan (nama, alamat, produk, jumlah, pembayaran, file_upload) VALUES ('$nama', '$alamat', '$produk', '$jumlah', '$pembayaran', '$newFilename')";

if ($conn->query($sql) === TRUE) {
    echo "Pesanan berhasil dikirim!<br>";
    echo "Detail Pesanan:<br>";
    echo "Nama: $nama<br>";
    echo "Alamat: $alamat<br>";
    echo "Produk: $produk<br>";
    echo "Jumlah: $jumlah<br>";
    echo "Metode Pembayaran: $pembayaran<br>";
    echo "File yang diunggah: $newFilename<br>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
