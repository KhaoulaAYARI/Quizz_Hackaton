<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/resultatQuiz.css"/>

    <title>Scores</title>
</head>
<body>
    <h1>Résultat du Quiz</h1>
    <h2>Voici votre résultat :</h2>
    <?php
    session_start();
    if (isset($_SESSION['score'])) {
        echo "<h3> {$_SESSION['score']} sur 3.</h3>";
        session_destroy(); // Terminer la session
    } else {
        echo "<p>Aucun résultat trouvé.</p>";
    }
    ?>
    <a href="welcome.html"><button class="valider-btn">Refaire le Quiz</button></a>
</body>
</html>
