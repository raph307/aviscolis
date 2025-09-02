<?php


$filepath = __DIR__ . "/avis.csv";

// Debug
echo "<!-- Debug: Fichier CSV path: $filepath -->";
echo "<!-- Debug: Fichier existe: " . (file_exists($filepath) ? 'OUI' : 'NON') . " -->";

// Fonction pour afficher NULL si vide
function displayValue($value) {
    return (!empty($value) && trim($value) !== '') ? $value : 'NULL';
}

// Définir les en-têtes côté PHP
$header = [
    'Nom Prénom',
    'Adresse', 
    'Date Réception',
    'Quartier',
    'Évaluation Livraison',
    'Évaluation Amabilité',
    'Pourboire',
    'Commentaire',
    'Date Envoi',
    'IP'
];

// Lire le CSV (données seulement, sans en-tête)
$avis = [];
if (file_exists($filepath)) {
    $content = file_get_contents($filepath);
    echo "<!-- Debug: Contenu brut: " . htmlspecialchars(substr($content, 0, 200)) . "... -->";
    
    $lines = str_getcsv($content, "\n");
    if (!empty($lines)) {
        foreach ($lines as $line) {
            if (!empty(trim($line))) {
                $data = str_getcsv($line);
                // Combiner avec les en-têtes définis côté PHP
                if (count($data) === count($header)) {
                    $avis[] = array_combine($header, $data);
                }
            }
        }
    }
}

echo "<!-- Debug: Nombre d'avis: " . count($avis) . " -->";
$avis = array_reverse($avis);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultats des Avis - La Poste</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #0f1729 0%, #1e3a8a 50%, #312e81 100%);
            min-height: 100vh;
            padding: 40px 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 40px;
        }

        .logo-laposte {
            width: 8rem;
            height: auto;
            filter: drop-shadow(0 0 20px rgba(251, 191, 36, 0.5));
            margin-bottom: 20px;
            border-radius: 10px;
        }

        .title {
            color: white;
            font-size: 32px;
            font-weight: 800;
            text-shadow: 0 0 20px rgba(251, 191, 36, 0.5);
            margin-bottom: 10px;
        }

        .subtitle {
            color: rgba(255, 255, 255, 0.8);
            font-size: 16px;
        }

        .table-container {
            max-width: 1400px;
            margin: 0 auto;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
            overflow: hidden;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }

        th, td {
            text-align: left;
            padding: 16px 20px;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        th {
            background: linear-gradient(135deg, #1e3a8a 0%, #312e81 100%);
            color: white;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 12px;
            position: sticky;
            top: 0;
            z-index: 10;
        }

        th:first-child {
            border-top-left-radius: 20px;
        }

        th:last-child {
            border-top-right-radius: 20px;
        }

        tbody tr {
            transition: all 0.3s ease;
        }

        tbody tr:hover {
            background: rgba(251, 191, 36, 0.1);
            transform: scale(1.02);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        tbody tr:nth-child(even) {
            background: rgba(248, 250, 252, 0.5);
        }

        .rating {
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }

        .star {
            color: #fbbf24;
            font-size: 16px;
        }

        .star.empty {
            color: #e5e7eb;
        }

        .pourboire {
            font-weight: 600;
            padding: 4px 8px;
            border-radius: 8px;
            font-size: 12px;
        }

        .pourboire.oui {
            background: rgba(16, 185, 129, 0.1);
            color: #059669;
        }

        .pourboire.montant {
            background: rgba(251, 191, 36, 0.1);
            color: #f59e0b;
        }

        .pourboire.non {
            background: rgba(239, 68, 68, 0.1);
            color: #dc2626;
        }

        .commentaire {
            max-width: 200px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .commentaire:hover {
            white-space: normal;
            overflow: visible;
            background: rgba(251, 191, 36, 0.1);
            padding: 8px;
            border-radius: 8px;
            position: relative;
            z-index: 5;
        }

        .date {
            font-size: 12px;
            color: #64748b;
        }

        .quartier {
            font-weight: 600;
            color: #1e3a8a;
        }

        .quartier.jardin-mail {
            color: #059669;
        }

        .quartier.pasteur {
            color: #7c3aed;
        }
        .total-count {
            text-align: center;
            margin-bottom: 30px;
            max-width: 1400px;
            margin-left: auto;
            margin-right: auto;
        }

        .count-number {
            font-size: 48px;
            font-weight: 800;
            color: #fbbf24;
            text-shadow: 0 0 20px rgba(251, 191, 36, 0.5);
            margin-right: 10px;
        }

        .count-label {
            font-size: 18px;
            color: rgba(255, 255, 255, 0.8);
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        @media (max-width: 768px) {
            .table-container {
                overflow-x: auto;
            }
            
            th, td {
                padding: 12px 8px;
                font-size: 12px;
            }
            
            .commentaire {
                max-width: 100px;
            }
        }

        .no-data {
            text-align: center;
            padding: 60px 20px;
            color: #64748b;
            font-size: 18px;
        }
    </style>
</head>
<body>
    <div class="header">
        <img src="LOGO_LAPOSTE.png" alt="La Poste" class="logo-laposte">
        <h1 class="title">Tableau de Bord des Avis</h1>
        <p class="subtitle">Suivi des retours clients en temps réel</p>
    </div>

    <div class="total-count">
        <span class="count-number"><?= count($avis) ?></span>
        <span class="count-label">avis clients</span>
    </div>

    <?php if (!empty($avis)): ?>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Client</th>
                        <th>Adresse</th>
                        <th>Date Réception</th>
                        <th>Quartier</th>
                        <th>Note Livraison</th>
                        <th>Note Amabilité</th>
                        <th>Pourboire</th>
                        <th>Commentaire</th>
                        <th>Date Envoi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($avis as $item): ?>
                        <tr>
                           <td><?= htmlspecialchars(displayValue($item['Nom Prénom'] ?? '')) ?></td>
                            <td><?= htmlspecialchars(displayValue($item['Adresse'] ?? '')) ?></td>
                            <td><?= htmlspecialchars(displayValue($item['Date Réception'] ?? '')) ?></td>
                            <td>
                                <span class="quartier <?= htmlspecialchars($item['Quartier'] ?? '') ?>">
                                    <?php
                                    $quartiers = [
                                        'jardin-mail' => 'Jardin Mail',
                                        'pasteur' => 'Pasteur',
                                        'pont-de-ce' => 'Pont de Cé'
                                    ];
                                    echo $quartiers[$item['Quartier']] ?? $item['Quartier'];
                                    ?>
                                </span>
                            </td>
                            <td>
                                <?php if (!empty($item['Évaluation Livraison'])): ?>
                                    <div class="rating">
                                        <?php for ($i = 1; $i <= 5; $i++): ?>
                                            <span class="star <?= $i <= (int)$item['Évaluation Livraison'] ? '' : 'empty' ?>">★</span>
                                        <?php endfor; ?>
                                    </div>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if (!empty($item['Évaluation Amabilité'])): ?>
                                    <div class="rating">
                                        <?php for ($i = 1; $i <= 5; $i++): ?>
                                            <span class="star <?= $i <= (int)$item['Évaluation Amabilité'] ? '' : 'empty' ?>">★</span>
                                        <?php endfor; ?>
                                    </div>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php
                                $pourboire = $item['Pourboire'] ?? '';
                                if ($pourboire === 'oui') {
                                    echo '<span class="pourboire oui">Oui</span>';
                                } elseif ($pourboire === 'non' || $pourboire === 'none') {
                                    echo '<span class="pourboire non">Non</span>';
                                } elseif (!empty($pourboire)) {
                                    echo '<span class="pourboire montant">' . htmlspecialchars($pourboire) . '</span>';
                                }
                                ?>
                            </td>
                            <td>
                                <div class="commentaire" title="<?= htmlspecialchars(displayValue($item['Commentaire'] ?? '')) ?>">
                                    <?= htmlspecialchars(displayValue($item['Commentaire'] ?? '')) ?>
                                </div>
                            </td>
                            <td>
                                <div class="date"><?= htmlspecialchars($item['Date Envoi'] ?? $item['Date'] ?? '') ?></div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <div class="table-container">
            <div class="no-data">
                <h2>Aucun avis pour le moment</h2>
                <p>Les avis clients apparaîtront ici une fois le formulaire rempli.</p>
            </div>
        </div>
    <?php endif; ?>
</body>
</html>