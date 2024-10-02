<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pemesanan - Toko Sembako</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            padding: 20px;
        }
        .form-container {
            max-width: 400px;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
        }
        input[type="text"], input[type="number"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .back-link {
            display: block;
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Form Pemesanan</h2>
    <form action="process_pemesanan.php" method="POST">
        <label for="nama">Nama Lengkap:</label>
        <input type="text" id="nama" name="nama" placeholder="Masukkan nama Anda" required>

        <label for="jumlah">Jumlah Pesanan:</label>
        <input type="number" id="jumlah" name="jumlah" placeholder="Masukkan jumlah pesanan" required>

        <label for="password">Password Akun:</label>
        <input type="password" id="password" name="password" placeholder="Masukkan password" required>

        <input type="submit" value="Kirim Pesanan">
    </form>
    <a href="index.php" class="back-link">Kembali ke Produk</a>
</div>

</body>
</html>
