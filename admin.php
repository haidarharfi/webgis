<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Upload Files</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script>
        function displayFileName(inputId, displayId) {
            const input = document.getElementById(inputId);
            const display = document.getElementById(displayId);
            input.addEventListener('change', function() {
                if (input.files.length > 0) {
                    display.textContent = `Selected file: ${input.files[0].name}`;
                } else {
                    display.textContent = '';
                }
            });
        }

        window.onload = function() {
            displayFileName('matFile', 'matFileName');
            displayFileName('geolistrikFile', 'geolistrikFileName');
            displayFileName('fotoGeolistrikFile', 'fotoGeolistrikFileName');
        }
    </script>
</head>
<body>
    <div class="container mt-5">
        <h2>Upload Files</h2>
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="matFile" class="form-label">Select Data MAT file:</label>
                <input type="file" class="form-control" id="matFile" name="matFile" accept=".mat">
                <div id="matFileName" class="mt-2"></div>
            </div>
            <div class="mb-3">
                <label for="geolistrikFile" class="form-label">Select Data Geolistrik file:</label>
                <input type="file" class="form-control" id="geolistrikFile" name="geolistrikFile" accept=".geojson">
                <div id="geolistrikFileName" class="mt-2"></div>
            </div>
            <div class="mb-3">
                <label for="fotoGeolistrikFile" class="form-label">Select Foto Geolistrik file (PNG only):</label>
                <input type="file" class="form-control" id="fotoGeolistrikFile" name="fotoGeolistrikFile" accept=".png">
                <div id="fotoGeolistrikFileName" class="mt-2"></div>
            </div>
            <button type="submit" class="btn btn-primary">Upload</button>
        </form>
    </div>
</body>
</html>
