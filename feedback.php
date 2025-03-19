<?php
session_start();

// Vérifier si les données sont bien envoyées
if (!isset($_POST['question']) || !isset($_POST['answer'])) {
    die("Données invalides.");
}

// Initialiser le score si nécessaire
if (!isset($_SESSION['score'])) {
    $_SESSION['score'] = 0;
}

$question = $_POST['question'];
$answer = $_POST['answer'];

// Réponses correctes et explications
$correctAnswers = [
    1 => ['answer' => '2', 'explanation' => 'Le Green IT, ou informatique verte, est une approche qui vise à réduire l’impact environnemental des technologies de l’information et de la communication (TIC) tout au long de leur cycle de vie:Favoriser du matériel éco-conçu qui consomme moins d’énergie, Développer des logiciels moins gourmands en ressources (eco-coding)...'],
    2 => ['answer' => '2', 'explanation' => 'L’empreinte carbone numérique désigne la quantité de dioxyde de carbone (CO₂) émise tout au long du cycle de vie des technologies de l’information (TIC), y compris la production, l’utilisation, et la gestion des déchets associés. Cette empreinte carbone est une mesure essentielle pour comprendre et réduire l’impact environnemental des équipements et services numériques.'],
    3 => ['answer' => '2', 'explanation' => 'L’étape de production du matériel (ordinateurs, smartphones, serveurs, etc.) est celle qui a le plus grand impact écologique dans le cycle de vie des équipements numériques. Cela s’explique par plusieurs facteurs liés à l’extraction des ressources, à la fabrication et au transport des appareils avant leur utilisation.']
];

// Vérifier si la réponse est correcte
$isCorrect = isset($correctAnswers[$question]) && $correctAnswers[$question]['answer'] === $answer;

// Mettre à jour le score si la réponse est correcte
if ($isCorrect) {
    $_SESSION['score']++;
}

// Récupérer l’explication
$explanation = $correctAnswers[$question]['explanation'] ?? "Aucune explication disponible.";

// Déterminer la prochaine question
$nextQuestion = $question + 1;
$nextUrl = ($nextQuestion <= count($correctAnswers)) ? "question{$nextQuestion}.html" : "scores.php";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/feedback.css"/>
    <title>Correction</title>
</head>
<body>
    <h1><?php echo $isCorrect ? "Bonne réponse !" : "Mauvaise réponse"; ?></h1>
    <p>La bonne réponse était : <strong><?php echo $correctAnswers[$question]['answer']; ?></strong></p>
    <p id="explanation"><?php echo $explanation; ?></p>
    
    <a href="<?php echo $nextUrl; ?>"><button id="valider-btn">Suivant</button></a>
</body>
</html>
