<?php
// Connexion à la base de données
$conn = new mysqli("localhost", "root", "", "cecogec");
if ($conn->connect_error) {
    die("Échec de la connexion: " . $conn->connect_error);
}

// Récupérer l'ID de l'intervention à partir de l'URL
$intervention_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Vérifier si un ID valide est fourni
if ($intervention_id == 0) {
    echo "Intervention non trouvée.";
    exit;
}

// Récupérer les informations de l'intervention
$intervention_sql = "SELECT i.id, s.nom AS service_nom, i.date_intervention, i.motif, i.statut 
                     FROM interventions i 
                     JOIN services s ON i.service_id = s.id 
                     WHERE i.id = ?";
$stmt = $conn->prepare($intervention_sql);
$stmt->bind_param("i", $intervention_id);
$stmt->execute();
$result = $stmt->get_result();
$intervention = $result->fetch_assoc();

if (!$intervention) {
    echo "Intervention non trouvée.";
    exit;
}

// Récupérer les agents assignés à cette intervention
$agents_sql = "SELECT a.nom, a.prenom 
               FROM intervention_agents ia 
               JOIN agents a ON ia.agent_id = a.id 
               WHERE ia.intervention_id = ?";
$stmt_agents = $conn->prepare($agents_sql);
$stmt_agents->bind_param("i", $intervention_id);
$stmt_agents->execute();
$result_agents = $stmt_agents->get_result();

// Récupérer les matériels assignés à cette intervention
$materiels_sql = "SELECT m.nom 
                  FROM intervention_materiels im 
                  JOIN materiels m ON im.materiel_id = m.id 
                  WHERE im.intervention_id = ?";
$stmt_materiels = $conn->prepare($materiels_sql);
$stmt_materiels->bind_param("i", $intervention_id);
$stmt_materiels->execute();
$result_materiels = $stmt_materiels->get_result();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de l'Intervention</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">CECOGEC Admin</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Tableau de Bord</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="interventions_en_cours.php">Interventions en Cours</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mt-4">
        <h2 class="mb-4">Détails de l'Intervention</h2>

        <!-- Détails de l'intervention -->
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                Détails de l'Intervention #<?php echo $intervention['id']; ?>
            </div>
            <div class="card-body">
                <p><strong>Service d'Intervention :</strong> <?php echo $intervention['service_nom']; ?></p>
                <p><strong>Date de l'Intervention :</strong> <?php echo $intervention['date_intervention']; ?></p>
                <p><strong>Motif de l'Intervention :</strong> <?php echo $intervention['motif']; ?></p>
                <p><strong>Statut :</strong> <?php echo $intervention['statut']; ?></p>
            </div>
        </div>

        <!-- Agents assignés à l'intervention -->
        <div class="card mb-4">
            <div class="card-header bg-success text-white">
                Agents en Intervention
            </div>
            <div class="card-body">
                <?php if ($result_agents->num_rows > 0): ?>
                    <ul class="list-group">
                        <?php while ($agent = $result_agents->fetch_assoc()): ?>
                            <li class="list-group-item"><?php echo $agent['nom'] . " " . $agent['prenom']; ?></li>
                        <?php endwhile; ?>
                    </ul>
                <?php else: ?>
                    <p>Aucun agent assigné.</p>
                <?php endif; ?>
            </div>
        </div>

        <!-- Matériels utilisés dans l'intervention -->
        <div class="card mb-4">
            <div class="card-header bg-info text-white">
                Matériels Utilisés
            </div>
            <div class="card-body">
                <?php if ($result_materiels->num_rows > 0): ?>
                    <ul class="list-group">
                        <?php while ($materiel = $result_materiels->fetch_assoc()): ?>
                            <li class="list-group-item"><?php echo $materiel['nom']; ?></li>
                        <?php endwhile; ?>
                    </ul>
                <?php else: ?>
                    <p>Aucun matériel utilisé.</p>
                <?php endif; ?>
            </div>
        </div>

        <a href="interventions_en_cours.php" class="btn btn-secondary">Retour à la liste des interventions</a>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3 mt-4">
        <p>&copy; 2024 CECOGEC. Tous droits réservés.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
</body>
</html>
