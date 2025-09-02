<?php
// Récupération des données du formulaire
$nom_prenom = $_POST['nom'] ?? '';
$adresse = $_POST['adresse'] ?? '';
$date_reception = $_POST['date_reception'] ?? '';
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
$line = "\"$nom_prenom\",\"$adresse\",\"$date_reception\",\"$quartier\",\"$evaluation_livraison\",\"$evaluation_amabilite\",\"$pourboire\",\"$commentaire\",\"$date\",\"$ip\"\n";

// Créer l'en-tête CSV si le fichier n'existe pas
$filepath = __DIR__ . "/avis.csv";
if (!file_exists($filepath)) {
    file_put_contents($filepath, $header, LOCK_EX);
} else {
    // Vérifier si le fichier a déjà un en-tête
    $firstLine = trim(fgets(fopen($filepath, 'r')));
    if (strpos($firstLine, 'Nom Prénom') === false) {
        // Ajouter l'en-tête au début du fichier existant
        $content = file_get_contents($filepath);
        $header = "\"Nom Prénom\",\"Adresse\",\"Date Réception\",\"Quartier\",\"Évaluation Livraison\",\"Évaluation Amabilité\",\"Pourboire\",\"Commentaire\",\"Date Envoi\",\"IP\"\n";
        file_put_contents($filepath, $header . $content, LOCK_EX);
    }
}
// Enregistrement dans le fichier
file_put_contents($filepath, $line, FILE_APPEND | LOCK_EX);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Merci - La Poste</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #0f1729 0%, #1e3a8a 50%, #312e81 100%);
            min-height: 100vh;
            display: flex;
            align-items: flex-start;
            justify-content: center;
            padding: 200px 20px 40px;
            position: relative;
            overflow-x: hidden;
        }
        
        .container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 24px;
            box-shadow: 
                0 32px 64px rgba(0, 0, 0, 0.25),
                0 0 0 1px rgba(251, 191, 36, 0.1),
                inset 0 1px 0 rgba(255, 255, 255, 0.5);
            max-width: 520px;
            width: 100%;
            text-align: center;
            padding: 60px 30px;
            animation: slideUp 0.8s cubic-bezier(0.16, 1, 0.3, 1);
            margin: top 40px;;
        }
        @media (max-width: 480px) {
            body {
                padding: 40px 15px 20px 15px;
            }
            
            .container {
                margin-top: 20px;
                padding: 40px 20px;
            }
            
            .thank-you-title {
                font-size: 28px;
            }
            
            .thank-you-message {
                font-size: 16px;
            }
            
            .logo-laposte {
                width: 10rem;
            }
        }
        
        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(40px) scale(0.95);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }
        
        .logo-laposte {
            width: 12rem;
            height: auto;
            filter: drop-shadow(0 0 20px rgba(251, 191, 36, 0.5));
            margin-bottom: 30px;
            border-radius: 10px;
        }
        
        .thank-you-title {
            font-size: 36px;
            font-weight: 800;
            background: linear-gradient(135deg, #fbbf24 0%, #f59e0b 100%);
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-shadow: 0 0 30px rgba(251, 191, 36, 0.6);
            margin-bottom: 30px;
            cursor: pointer;
            transition: all 1s ease;
            letter-spacing: 2px;
            animation: goldShine 3s ease-in-out infinite;
        }
        
        .thank-you-title:hover {
            background: linear-gradient(135deg, #1e3a8a 0%, #312e81 100%);
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-shadow: 0 0 30px rgba(30, 58, 138, 0.6);
            transform: scale(1.05);
        }
        
        @keyframes goldShine {
            0%, 100% { filter: brightness(1); }
            50% { filter: brightness(1.3); }
        }
        
        .thank-you-message {
            font-size: 18px;
            color: #0f1729;
            line-height: 1.6;
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="LOGO_LAPOSTE.png" alt="La Poste" class="logo-laposte">
        <h1 class="thank-you-title">Merci pour votre avis !</h1>
        <p class="thank-you-message">
            Votre retour est précieux et nous aide à améliorer nos services.<br>
            Votre avis a été enregistré avec succès.
        </p>
    </div>
</body>
</html>