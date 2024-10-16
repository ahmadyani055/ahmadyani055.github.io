<?php
$pdo = new PDO('mysql:host=localhost;dbname=crud_file', 'root', '');

// Mendapatkan file berdasarkan ID
$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT file_name FROM files WHERE id = :id");
$stmt->bindParam(':id', $id);
$stmt->execute();
$file = $stmt->fetch(PDO::FETCH_ASSOC);

if ($file) {
    // Hapus file dari direktori
    unlink('uploads/' . $file['file_name']);

    // Hapus data dari database
    $stmt = $pdo->prepare("DELETE FROM files WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    header("Location: index.php");
} else {
    echo "File tidak ditemukan!";
}
?>
