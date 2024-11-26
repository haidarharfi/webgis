<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Upload GeoJSON</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script>
        function validateForm(event) {
            const fileInput = document.getElementById('geojsonFile');
            if (!fileInput.value) {
                event.preventDefault(); // Prevent form submission
                alert("Anda Belum Pilih File, Silahkan Pilih File Dahulu");
            }
        }
    </script>
</head>
<body>
    <div class="container mt-5">
        <h2>Upload GeoJSON File</h2>
        <form action="upload.php" method="post" enctype="multipart/form-data" onsubmit="validateForm(event)">
            <div class="mb-3">
                <label for="geojsonFile" class="form-label">Select GeoJSON file:</label>
                <input type="file" class="form-control" id="geojsonFile" name="geojsonFile" accept=".geojson">
            </div>
            <button type="submit" class="btn btn-primary">Upload</button>
        </form>
    </div>
</body>
</html>
