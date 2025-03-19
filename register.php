<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $file = 'users.json';
    $users = file_exists($file) ? json_decode(file_get_contents($file), true) : [];

    foreach ($users as $user) {
        if ($user['username'] === $username) {
            die('Nom d\'utilisateur déjà pris.');
        }
    }

    $users[] = ['username' => $username, 'password' => $password];
    file_put_contents($file, json_encode($users, JSON_PRETTY_PRINT));
    header('Location: question1.html');
    exit;
}
?>
