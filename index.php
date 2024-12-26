<?php

// HTML content with an input file field similar to Dolibarr
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
    <style>
        .flat {
            border: 1px solid #ccc;
            padding: 8px;
            font-size: 16px;
        }
        .minwidth100 {
            min-width: 100px;
        }
        .maxwidthinputfileonsmartphone {
            max-width: 100%;
        }
    </style>
</head>
<body>

<form action="" method="post" enctype="multipart/form-data">
    <label for="logo">Logo:</label>
    <input type="file" class="flat minwidth100 maxwidthinputfileonsmartphone" name="logo" id="logo" accept="image/*">
    <button type="submit">Upload</button>
</form>

<?php
// PHP code to handle file upload
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['logo'])) {
    $uploadDir = __DIR__ . '/uploads/';

    // Ensure the uploads directory exists
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }

    $uploadFile = $uploadDir . basename($_FILES['logo']['name']);

    if (move_uploaded_file($_FILES['logo']['tmp_name'], $uploadFile)) {
        echo "<p>File successfully uploaded to: $uploadFile</p>";
    } else {
        echo "<p>Failed to upload the file.</p>";
    }
}
?>

</body>
</html>