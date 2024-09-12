<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interventions en Cours - CECOGEC Admin</title>
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
                    <a class="nav-link" href="add_agent.php">Ajouter Agent</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="add_materiel.php">Ajouter Matériel</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="add_intervention.php">Ajouter Intervention</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="interventions_en_cours.php">Interventions en Cours</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Déconnexion</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mt-4">
        <h2 class="mb-4">Interventions en Cours</h2>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Service</th>
                        <th>Date</th>
                        <th>Motif</th>
                        <th>Statut</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Connexion à la base de données
                    $conn = new mysqli("localhost", "root", "", "cecogec");
                    if ($conn->connect_error) {
                        die("Échec de la connexion: " . $conn->connect_error);
                    }

                    // Requête SQL pour récupérer les interventions en cours
                    $sql = "SELECT i.id, s.nom AS service_nom, i.date_intervention, i.motif, i.statut 
                            FROM interventions i 
                            JOIN services s ON i.service_id = s.id 
                            WHERE i.statut = 'En Cours'";
                    $result = $conn->query($sql);

                    // Afficher les résultats dans le tableau
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>{$row['id']}</td>";
                            echo "<td>{$row['service_nom']}</td>";
                            echo "<td>{$row['date_intervention']}</td>";
                            echo "<td>{$row['motif']}</td>";
                            echo "<td><span class='badge bg-warning text-dark'>{$row['statut']}</span></td>";
                            echo "<td>
                                    <a href='details_intervention.php?id={$row['id']}' class='btn btn-info btn-sm'>Détails</a>
                                    <a href='terminer_intervention.php?id={$row['id']}' class='btn btn-success btn-sm'>Terminer</a>
                                  </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6' class='text-center'>Aucune intervention en cours</td></tr>";
                    }

                    // Fermer la connexion
                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
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
