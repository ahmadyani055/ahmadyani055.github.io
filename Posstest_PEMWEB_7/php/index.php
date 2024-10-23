<?php
$pdo = new PDO('mysql:host=localhost;dbname=crud_file', 'root', '');

$stmt = $pdo->prepare("SELECT * FROM files");
$stmt->execute();
$files = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Upload File</title>
</head>
<body>
    <h2>Upload File</h2>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="file">
        <button type="submit">Upload</button>
    </form>

    <h2>List File</h2>
    <table border="1">
        <thead>
            <tr>
                <th>File Name</th>
                <th>Size</th>
                <th>Upload Time</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($files as $file): ?>
                <tr>
                    <td><?php echo $file['file_name']; ?></td>
                    <td><?php echo round($file['file_size'] / 1024, 2); ?> KB</td>
                    <td><?php echo $file['upload_time']; ?></td>
                    <td>
                        <a href="uploads/<?php echo $file['file_name']; ?>" download>Download</a> | 
                        <a href="delete.php?id=<?php echo $file['id']; ?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
