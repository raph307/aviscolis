<?php
// Récupération des données du formulaire
$nom_prenom = $_POST['nom'] ?? '';
$adresse = $_POST['adresse'] ?? '';
$quartier = $_POST['quartier'] ?? '';
$evaluation_livraison = $_POST['evaluation_livraison'] ?? '';
$evaluation_amabilite = $_POST['evaluation_amabilite'] ?? '';
$commentaire = $_POST['commentaire'] ?? '';
$pourboire = $_POST['pourboire'] ?? '';
$ip = $_SERVER['REMOTE_ADDR'];
$date = date('Y-m-d H:i:s');

// Nettoyage des données
$nom_prenom = str_replace(["\r", "\n"], [' ', ' '], $nom_prenom);
$nom_prenom = str_replace('"', '""', $nom_prenom);

$adresse = str_replace(["\r", "\n"], [' ', ' '], $adresse);
$adresse = str_replace('"', '""', $adresse);

$commentaire = str_replace(["\r", "\n"], [' ', ' '], $commentaire);
$commentaire = str_replace('"', '""', $commentaire);

// Préparer la ligne CSV
$line = "\"$nom_prenom\",\"$adresse\",\"$quartier\",\"$evaluation_livraison\",\"$evaluation_amabilite\",\"$pourboire\",\"$commentaire\",\"$date\",\"$ip\"\n";

// Créer l'en-tête CSV si le fichier n'existe pas
$filepath = __DIR__ . "/avis.csv";
if (!file_exists($filepath)) {
    $header = "\"Nom Prénom\",\"Adresse\",\"Quartier\",\"Évaluation Livraison\",\"Évaluation Amabilité\",\"Pourboire\",\"Commentaire\",\"Date\",\"IP\"\n";
    file_put_contents($filepath, $header, LOCK_EX);
}

// Enregistrement dans le fichier
file_put_contents($filepath, $line, FILE_APPEND | LOCK_EX);

// Message de confirmation
echo "Merci ! Votre avis a bien été enregistré.";
?>