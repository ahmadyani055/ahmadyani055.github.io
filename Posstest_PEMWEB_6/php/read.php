<?php
include 'konek.php';

$sql = "SELECT * FROM pemesanan";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pemesanan</title>
    <link rel="stylesheet" href="../css/style.css"> 
</head>
<body>
    <div class="container">
        <h1>Data Pemesanan</h1>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Produk</th>
                <th>Jumlah</th>
                <th>Pembayaran</th>
                <th>Aksi</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>".$row["id"]."</td>
                            <td>".$row["nama"]."</td>
                            <td>".$row["alamat"]."</td>
                            <td>".$row["produk"]."</td>
                            <td>".$row["jumlah"]."</td>
                            <td>".$row["pembayaran"]."</td>
                            <td>
                                <a href='update.php?id=".$row["id"]."'>Edit</a> | 
                                <a href='delete.php?id=".$row["id"]."' onclick='return confirm(\"Yakin ingin menghapus?\")'>Hapus</a>
                            </td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='7'>Tidak ada data pemesanan.</td></tr>";
            }
            $conn->close();
            ?>
        </table>
        <button class="back-button" onclick="window.location.href='index.html'">Kembali ke Form Pemesanan</button>
    </div>
</body>
</html>