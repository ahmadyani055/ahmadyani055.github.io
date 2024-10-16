<?php
include 'konek.php'; // Pastikan file konek.php mengandung koneksi yang benar

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Mengambil data dari form
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $produk = $_POST['produk'];
    $jumlah = $_POST['jumlah'];
    $pembayaran = $_POST['pembayaran'];

    // Menggunakan prepared statement untuk keamanan
    $sql = $conn->prepare("INSERT INTO pemesanan (nama, alamat, produk, jumlah, pembayaran) VALUES (?, ?, ?, ?, ?)");
    $sql->bind_param("sssis", $nama, $alamat, $produk, $jumlah, $pembayaran);

    if ($sql->execute()) {
        echo "<h3>Pesanan berhasil dikirim!</h3>";

        // Query untuk mendapatkan data pesanan terakhir yang baru saja dimasukkan
        $last_id = $conn->insert_id; // Dapatkan ID dari pesanan terakhir
        $result = $conn->query("SELECT * FROM pemesanan WHERE id_pesanan = $last_id");

        if ($result->num_rows > 0) {
            // Tampilkan data pesanan
            echo "<h3>Detail Pesanan:</h3>";
            while ($row = $result->fetch_assoc()) {
                echo "Nama: " . $row['nama'] . "<br>";
                echo "Alamat: " . $row['alamat'] . "<br>";
                echo "Produk: " . $row['produk'] . "<br>";
                echo "Jumlah: " . $row['jumlah'] . "<br>";
                echo "Metode Pembayaran: " . $row['pembayaran'] . "<br>";
            }
        } else {
            echo "Tidak ada data pesanan yang ditemukan.";
        }
    } else {
        echo "Terjadi kesalahan: " . $sql->error;
    }

    $sql->close(); // Tutup prepared statement
} else {
    echo "Metode pengiriman data tidak valid.";
}

$conn->close(); // Tutup koneksi
?>
