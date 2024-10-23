<?php
$pdo = new PDO('mysql:host=localhost;dbname=toko_sembako', 'root', '');

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM pesanan WHERE id = :id");
$stmt->bindParam(':id', $id);
$stmt->execute();
$pesanan = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $produk = $_POST['produk'];
    $jumlah = $_POST['jumlah'];
    $pembayaran = $_POST['pembayaran'];

    // Update data ke database
    $stmt = $pdo->prepare("UPDATE pesanan SET nama = :nama, alamat = :alamat, produk = :produk, jumlah = :jumlah, pembayaran = :pembayaran WHERE id = :id");
    $stmt->bindParam(':nama', $nama);
    $stmt->bindParam(':alamat', $alamat);
    $stmt->bindParam(':produk', $produk);
    $stmt->bindParam(':jumlah', $jumlah);
    $stmt->bindParam(':pembayaran', $pembayaran);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    header("Location: list_pesanan.php");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pesanan</title>
    <link rel="stylesheet" href="../css/edit_pesanan.css">
</head>
<body>

    <div class="container">
        <h1>Edit Pesanan</h1>
        <form action="" method="post">
            <label for="nama">Nama Lengkap:</label>
            <input type="text" id="nama" name="nama" value="<?php echo $pesanan['nama']; ?>" required>

            <label for="alamat">Alamat Pengiriman:</label>
            <textarea id="alamat" name="alamat" rows="4" required><?php echo $pesanan['alamat']; ?></textarea>

            <label for="produk">Pilih Produk:</label>
            <select id="produk" name="produk" required>
                <option value="Beras Premium" <?php if ($pesanan['produk'] == 'Beras Premium') echo 'selected'; ?>>Beras Premium</option>
                <option value="Minyak Goreng" <?php if ($pesanan['produk'] == 'Minyak Goreng') echo 'selected'; ?>>Minyak Goreng</option>
                <option value="Gula Pasir" <?php if ($pesanan['produk'] == 'Gula Pasir') echo 'selected'; ?>>Gula Pasir</option>
            </select>

            <label for="jumlah">Jumlah Barang:</label>
            <input type="number" id="jumlah" name="jumlah" value="<?php echo $pesanan['jumlah']; ?>" min="1" required>

            <label for="pembayaran">Metode Pembayaran:</label>
            <select id="pembayaran" name="pembayaran" required>
                <option value="Transfer Bank" <?php if ($pesanan['pembayaran'] == 'Transfer Bank') echo 'selected'; ?>>Transfer Bank</option>
                <option value="COD" <?php if ($pesanan['pembayaran'] == 'COD') echo 'selected'; ?>>COD</option>
            </select>

            <button type="submit">Simpan Perubahan</button>
        </form>

        <button class="back-button" onclick="location.href='list_pesanan.php'">Kembali</button>
    </div>

</body>
</html>
