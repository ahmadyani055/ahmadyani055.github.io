<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $produk = $_POST['produk'];
    $jumlah = $_POST['jumlah'];
    $pembayaran = $_POST['pembayaran'];

    echo "<h1>Pesanan Anda:</h1>";
    echo "Nama: " . htmlspecialchars($nama) . "<br>";
    echo "Alamat: " . htmlspecialchars($alamat) . "<br>";
    echo "Produk: " . htmlspecialchars($produk) . "<br>";
    echo "Jumlah: " . htmlspecialchars($jumlah) . "<br>";
    echo "Metode Pembayaran: " . htmlspecialchars($pembayaran) . "<br>";

} else {
    echo "Form belum disubmit.";
}
?>
