<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $address = htmlspecialchars($_POST['address']);
    $product = htmlspecialchars($_POST['product']);
    $price = htmlspecialchars($_POST['price']);


    echo "<h1>Pesanan Diterima!</h1>";
    echo "<p>Nama: $name</p>";
    echo "<p>Alamat: $address</p>";
    echo "<p>Produk: $product</p>";
    echo "<p>Harga: $price</p>";
    echo '<a href="../index.html">Kembali ke Toko</a>';
} else {
    header("Location: ../index.html");
    exit;
}
?>
