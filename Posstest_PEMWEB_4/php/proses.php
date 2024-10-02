<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pemesanan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            padding: 20px;
        }
        .result-container {
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
        .back-link {
            display: block;
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<div class="result-container">
    <h2>Hasil Pemesanan Anda</h2>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama = htmlspecialchars($_POST['nama']);
        $jumlah = htmlspecialchars($_POST['jumlah']);
        $password = htmlspecialchars($_POST['password']);

        echo "<p>Nama Lengkap: $nama</p>";
        echo "<p>Jumlah Pesanan: $jumlah</p>";
        echo "<p>Password (terenkripsi): " . md5($password) . "</p>";
    }
    ?>
    <a href="form_pemesanan.php" class="back-link">Kembali ke Form</a>
</div>

</body>
</html>
