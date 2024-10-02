<?php
$productName = isset($_GET['product']) ? $_GET['product'] : '';
$price = '';

switch ($productName) {
    case 'beras':
        $price = 'Rp 12.000/kg';
        break;
    case 'minyak':
        $price = 'Rp 14.000/L';
        break;
    case 'gula':
        $price = 'Rp 10.000/kg';
        break;
    default:
        header("Location: ../index.html");
        exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pembelian</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <h1>Form Pembelian</h1>
        <div class="navbar">
            <a href="../index.html">Home</a>
        </div>
    </header>

    <div class="content">
        <h2>Produk yang Dipilih: <?php echo htmlspecialchars($productName); ?></h2>
        <p>Harga: <?php echo htmlspecialchars($price); ?></p>

        <form action="process_order.php" method="post">
            <label for="name">Nama Pembeli:</label>
            <input type="text" id="name" name="name" required>

            <label for="address">Alamat:</label>
            <input type="text" id="address" name="address" required>

            <input type="hidden" name="product" value="<?php echo htmlspecialchars($productName); ?>">
            <input type="hidden" name="price" value="<?php echo htmlspecialchars($price); ?>">
            <button type="submit">Kirim Pesanan</button>
        </form>
    </div>

    <div class="footer">
        <p>&copy; 2024 Toko Sembako Online</p>
    </div>
</body>
</html>
