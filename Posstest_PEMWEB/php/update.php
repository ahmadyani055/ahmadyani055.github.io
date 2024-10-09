<?php
include 'konek.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $produk = $_POST['produk'];
    $jumlah = $_POST['jumlah'];
    $pembayaran = $_POST['pembayaran'];

    $sql = "UPDATE pemesanan SET 
            nama='$nama', 
            alamat='$alamat', 
            produk='$produk', 
            jumlah=$jumlah, 
            pembayaran='$pembayaran' 
            WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil diperbarui! <a href='read.php'>Lihat Data Pemesanan</a>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM pemesanan WHERE id=$id";
    $result = $conn->query($sql);
    $data = $result->fetch_assoc();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pemesanan</title>
    <link rel="stylesheet" href="../css/form-style.css"> 
</head>
<body>
    <div class="container">
        <h1>Edit Pemesanan</h1>
        <form action="update.php" method="post">
            <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
            <label for="nama">Nama Lengkap:</label>
            <input type="text" id="nama" name="nama" value="<?php echo $data['nama']; ?>" required>

            <label for="alamat">Alamat Pengiriman:</label>
            <textarea id="alamat" name="alamat" rows="4" required><?php echo $data['alamat']; ?></textarea>

            <label for="produk">Pilih Produk:</label>
            <select id="produk" name="produk" required>
                <option value="Beras Premium" <?php if ($data['produk'] == 'Beras Premium') echo 'selected'; ?>>Beras Premium</option>
                <option value="Minyak Goreng" <?php if ($data['produk'] == 'Minyak Goreng') echo 'selected'; ?>>Minyak Goreng</option>
                <option value="Gula Pasir" <?php if ($data['produk'] == 'Gula Pasir') echo 'selected'; ?>>Gula Pasir</option>
            </select>

            <label for="jumlah">Jumlah Barang:</label>
            <input type="number" id="jumlah" name="jumlah" value="<?php echo $data['jumlah']; ?>" min="1" required>

            <label for="pembayaran">Metode Pembayaran:</label>
            <select id="pembayaran" name="pembayaran" required>
                <option value="Transfer Bank" <?php if ($data['pembayaran'] == 'Transfer Bank') echo 'selected'; ?>>Transfer Bank</option>
                <option value="COD" <?php if ($data['pembayaran'] == 'COD') echo 'selected'; ?>>Cash on Delivery (COD)</option>
            </select>

            <button type="submit">Perbarui Pesanan</button>
        </form>
        <button class="back-button" onclick="window.location.href='read.php'">Kembali</button>
    </div>
</body>
</html>
