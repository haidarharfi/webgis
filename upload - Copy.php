<?php
$message = ""; // Initialize message variable

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $target_dir = "uploads/";
    
    // Get the original filename
    $original_filename = basename($_FILES["geojsonFile"]["name"]);
    
    // Generate a unique filename to avoid overwriting
    $target_file = $target_dir . uniqid() . '_' . $original_filename;
    
    // Check if file is a valid GeoJSON
    $file_content = file_get_contents($_FILES["geojsonFile"]["tmp_name"]);
    $json_data = json_decode($file_content);
    
    if ($json_data && isset($json_data->type) && $json_data->type === "FeatureCollection") {
        if (move_uploaded_file($_FILES["geojsonFile"]["tmp_name"], $target_file)) {
            $message = "Anda Telah Berhasil Upload File: " . $original_filename;
        } else {
            $message = "Maaf, terjadi kesalahan saat mengunggah file Anda.";
        }
    } else {
        $message = "File GeoJSON tidak valid.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload GeoJSON</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .message {
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
        }
        .home-button {
            font-size: 20px;
            padding: 10px 20px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <?php if ($message): ?>
        <div class="message"><?php echo $message; ?></div>
    <?php endif; ?>
    
    <button class="home-button" onclick="window.location.href='index.html'">Home</button>
</body>
</html>
