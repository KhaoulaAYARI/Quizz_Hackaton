<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $file = 'users.json';

    if (!isset($_SESSION['username'])) {
        http_response_code(403);
        echo "Utilisateur non connecté.";
        exit;
    }

    $username = $_SESSION['username'];
    $input = json_decode(file_get_contents('php://input'), true);
    $score = $input['score'];

    $users = file_exists($file) ? json_decode(file_get_contents($file), true) : [];

    foreach ($users as &$user) {
        if ($user['username'] === $username) {
            if (!isset($user['score']) || $score > $user['score']) {
                $user['score'] = $score;
            }
            break;
        }
    }

    file_put_contents($file, json_encode($users, JSON_PRETTY_PRINT));
    echo "Score mis à jour avec succès.";
}
?>
