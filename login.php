<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $validUsername = 'secretadmin';
    $validPasswordHash = '9a1ea29fc637b44afc8578481206950985e2b426210e985d4c11d83b671f318a';

    $passwordHash = hash('sha256', $password);

    if ($username === $validUsername && $passwordHash === $validPasswordHash) {
        $_SESSION['authenticated'] = true;
        header('Location: topsecret_a9aedc6c39f654e55275ad8e65e316b3.php');
        exit();
    } else {
        header('Location: secret_172346606e1d24062e891d537e917a90.html?error=Invalid+credentials!');
        exit();
    }
}
?>
