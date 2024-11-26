<?php
// Define upload directories
$uploadDir = 'uploads/';
$geolistrikPhotoDir = $uploadDir . 'geolistrik/';

// Create directories if they don't exist
if (!file_exists($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}
if (!file_exists($geolistrikPhotoDir)) {
    mkdir($geolistrikPhotoDir, 0777, true);
}

// Function to handle file upload
function uploadFile($fileInputName, $targetDir, $newFileName) {
    if (isset($_FILES[$fileInputName]) && $_FILES[$fileInputName]['error'] == 0) {
        $fileExtension = pathinfo($_FILES[$fileInputName]['name'], PATHINFO_EXTENSION);
        $targetFile = $targetDir . $newFileName . '.' . $fileExtension;

        if (move_uploaded_file($_FILES[$fileInputName]['tmp_name'], $targetFile)) {
            return "File uploaded successfully: " . $targetFile;
        } else {
            return "Error uploading file: " . $fileInputName;
        }
    }
    return "No file uploaded for: " . $fileInputName;
}

// Handle file uploads
$matResult = uploadFile('matFile', $uploadDir, 'all');
$geolistrikResult = uploadFile('geolistrikFile', $uploadDir, 'all');
$fotoGeolistrikResult = uploadFile('fotoGeolistrikFile', $geolistrikPhotoDir, 'all');

// Display results
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload Results</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #4CAF50;
        }
        p {
            background: #e7f3fe;
            border-left: 6px solid #2196F3;
            padding: 10px;
            margin: 10px 0;
            border-radius: 4px;
        }
        a {
            display: inline-block;
            margin-top: 20px;
            text-align: center;
            text-decoration: none;
            background: #4CAF50;
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
            transition: background 0.3s;
        }
        a:hover {
            background: #45a049;
        }
        .button-group {
            text-align: center;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Upload Results</h2>
    <p><?php echo $matResult; ?></p>
    <p><?php echo $geolistrikResult; ?></p>
    <p><?php echo $fotoGeolistrikResult; ?></p>
    <div class="button-group">
        <a href="admin.php"><i class="fas fa-arrow-left"></i> Back to Admin Page</a>
        <a href="index.html"><i class="fas fa-home"></i> Home</a>
    </div>
</div>

</body>
</html>
