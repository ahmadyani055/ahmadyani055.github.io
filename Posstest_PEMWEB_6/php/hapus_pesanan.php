<?php
$pdo = new PDO('mysql:host=localhost;dbname=toko_sembako', 'root', '');

$id = $_GET['id'];

$stmt = $pdo->prepare("DELETE FROM pesanan WHERE id = :id");
$stmt->bindParam(':id', $id);
$stmt->execute();

header("Location: list_pesanan.php");
?>
