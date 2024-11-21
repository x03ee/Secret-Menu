<?php
session_start();

if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    header('Location: secret_172346606e1d24062e891d537e917a90.html');
    exit();
}

$flag = 'M1tMCTF{70p_53cr37_m15510n_c0mpl373}';

if (isset($_GET['download'])) {
    $file = $_GET['download'];
    if (strpos($file, '/assets/images/') === 0) {
        $filePath = __DIR__ . '/' . $file;
        if (file_exists($filePath)) {
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . basename($filePath) . '"');
            header('Content-Length: ' . filesize($filePath));
            readfile($filePath);
            exit();
        } else {
            die('File not found!');
        }
    } else {
        die('File path not allowed!');
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Top Secret Portal</title>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/secret-theme.css">
    <script src="/assets/js/displayImage.js"></script>
</head>
<body>
    <div class="container">
        <h1>Welcome to the Top Secret Government Portal</h1>
        <p>Authorized personnel only.</p>

        <img id="selectedImage" src="/assets/images/m1tm.png" alt="Selected Image">

        <form method="GET" action="">
            <label for="image">Select Image to Download:</label>
            <select name="download" id="image" onchange="updateImage()">
                <option value="/assets/images/m1tm.png">Image 1</option>
                <option value="/assets/images/m1tm.png">Image 2</option>
                <option value="/assets/images/m1tm.png">Image 3</option>
                <option value="/assets/images/m1tm.png">Image 4</option>
            </select>
            <button type="submit">Download</button>
        </form>
    </div>
</body>
</html>
