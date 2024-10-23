<?php
$pdo = new PDO('mysql:host=localhost;dbname=crud_file', 'root', '');

// Batas maksimal ukuran file 2MB
$maxFileSize = 2 * 1024 * 1024;

if ($_FILES['file']['error'] === UPLOAD_ERR_OK) {
    $file = $_FILES['file'];

    // Mengecek ukuran file
    if ($file['size'] > $maxFileSize) {
        echo "File terlalu besar! Maksimal 2MB.";
        exit;
    }

    // Mendapatkan nama file dan ekstensi
    $fileName = pathinfo($file['name'], PATHINFO_FILENAME);
    $fileExt = pathinfo($file['name'], PATHINFO_EXTENSION);

    // Penamaan file berdasarkan timestamp
    $newFileName = date('Y-m-d H.i.s') . '.' . $fileExt;

    // Direktori tujuan
    $uploadDir = 'uploads/';
    $uploadFilePath = $uploadDir . $newFileName;

    // Memindahkan file
    if (move_uploaded_file($file['tmp_name'], $uploadFilePath)) {
        // Menyimpan informasi file ke database
        $stmt = $pdo->prepare("INSERT INTO files (file_name, file_size) VALUES (:file_name, :file_size)");
        $stmt->bindParam(':file_name', $newFileName);
        $stmt->bindParam(':file_size', $file['size']);
        $stmt->execute();

        echo "File berhasil diupload!";
        header("Location: index.php");
    } else {
        echo "Upload gagal!";
    }
} else {
    echo "Tidak ada file yang diupload.";
}
?>
