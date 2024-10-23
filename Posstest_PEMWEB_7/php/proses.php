<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "toko_sembako"; 

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Mengambil data dari form
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$produk = $_POST['produk'];
$jumlah = $_POST['jumlah'];
$pembayaran = $_POST['pembayaran'];

// Menangani upload file
$targetDir = "uploads/"; // Pastikan folder ini ada
$fileName = date("Y-m-d H.i.s") . '.' . pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
$targetFile = $targetDir . $fileName;

if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFile)) {
    // File berhasil diunggah
    echo "File berhasil diunggah.<br>";
} else {
    echo "Maaf, ada kesalahan saat mengunggah file.<br>";
    echo "Debug info: " . $_FILES['file']['tmp_name'] . " -> " . $targetFile; // Menampilkan informasi debug
}

// Query untuk memasukkan data pemesanan
$sql = "INSERT INTO pemesanan (nama, alamat, produk, jumlah, pembayaran, file_upload) VALUES ('$nama', '$alamat', '$produk', '$jumlah', '$pembayaran', '$fileName')";

if ($conn->query($sql) === TRUE) {
    echo "Pesanan berhasil dikirim!<br>";
    echo "Detail Pesanan:<br>";
    echo "Nama: $nama<br>";
    echo "Alamat: $alamat<br>";
    echo "Produk: $produk<br>";
    echo "Jumlah: $jumlah<br>";
    echo "Metode Pembayaran: $pembayaran<br>";
    echo "File yang diunggah: $fileName<br>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
