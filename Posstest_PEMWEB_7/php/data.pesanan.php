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

$sql = "SELECT * FROM pemesanan";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pesanan</title>
</head>
<body>
    <h1>Data Pesanan</h1>
    <table border="1">
        <tr>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Produk</th>
            <th>Jumlah</th>
            <th>Pembayaran</th>
            <th>Aksi</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['nama']}</td>
                        <td>{$row['alamat']}</td>
                        <td>{$row['produk']}</td>
                        <td>{$row['jumlah']}</td>
                        <td>{$row['pembayaran']}</td>
                        <td>
                            <a href='edit.php?id={$row['id_pesanan']}'>Edit</a> | 
                            <a href='delete.php?id={$row['id_pesanan']}'>Delete</a>
                        </td>
                    </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>Tidak ada data pesanan yang ditemukan.</td></tr>";
        }
        ?>
    </table>
    <a href="form_pemesanan.php">Kembali ke Form Pemesanan</a>
</body>
</html>

<?php
$conn->close();
?>
