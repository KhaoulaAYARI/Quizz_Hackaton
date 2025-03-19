<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $file = 'users.json';
    $users = file_exists($file) ? json_decode(file_get_contents($file), true) : [];

    foreach ($users as $user) {
        if ($user['username'] === $username && password_verify($password, $user['password'])) {
            $_SESSION['username'] = $username;
            header('Location: question1.html');
            exit;
        }
    }

    echo 'Identifiants incorrects. <a href="login.html">Réessayez</a>.';
}
?>
