<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une Intervention - CECOGEC Admin</title>
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
                    <a class="nav-link" href="add_service.php">Ajouter Service</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="add_intervention.php">Ajouter Intervention</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Déconnexion</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mt-4">
        <h2 class="mb-4">Ajouter une Intervention</h2>
        <form action="insert_intervention.php" method="POST">
            <div class="mb-3">
                <label for="serviceSelect" class="form-label">Service d'Intervention</label>
                <select class="form-select" id="serviceSelect" name="service_id" required>
                    <option selected disabled>Choisir un service...</option>
                    <?php
                    // Connexion à la base de données
                    $conn = new mysqli("localhost", "root", "", "cecogec");
                    if ($conn->connect_error) {
                        die("Échec de la connexion: " . $conn->connect_error);
                    }

                    // Récupérer les services
                    $result = $conn->query("SELECT id, nom FROM services");
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='{$row['id']}'>{$row['nom']}</option>";
                    }
                    ?>
                </select>
            </div>

            <!-- Selection d'agents avec possibilité d'ajouter plusieurs agents -->
            <div id="agents-container">
                <div class="mb-3 agent-group">
                    <label for="agentSelect" class="form-label">Agents en Intervention</label>
                    <select class="form-select" id="agentSelect" name="agent_ids[]" required>
                        <option selected disabled>Choisir un agent...</option>
                        <?php
                        // Récupérer les agents
                        $result = $conn->query("SELECT id, CONCAT(nom, ' ', prenom) AS nom_complet FROM agents");
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='{$row['id']}'>{$row['nom_complet']}</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <button type="button" class="btn btn-secondary mb-3" id="add-agent">Ajouter un autre agent</button>

            <!-- Selection de matériels avec possibilité d'ajouter plusieurs matériels -->
            <div id="materiels-container">
                <div class="mb-3 materiel-group">
                    <label for="materielSelect" class="form-label">Matériels Utilisés</label>
                    <select class="form-select" id="materielSelect" name="materiel_ids[]" required>
                        <option selected disabled>Choisir un matériel...</option>
                        <?php
                        // Récupérer les matériels
                        $result = $conn->query("SELECT id, nom FROM materiels");
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='{$row['id']}'>{$row['nom']}</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <button type="button" class="btn btn-secondary mb-3" id="add-materiel">Ajouter un autre matériel</button>

            <!-- Date de l'intervention -->
            <div class="mb-3">
                <label for="dateIntervention" class="form-label">Date de l'Intervention</label>
                <input type="date" class="form-control" id="dateIntervention" name="date_intervention" required>
            </div>

            <!-- Motif de l'intervention -->
            <div class="mb-3">
                <label for="motif" class="form-label">Motif de l'Intervention</label>
                <textarea class="form-control" id="motif" name="motif" rows="3" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Enregistrer l'Intervention</button>
        </form>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3 mt-4">
        <p>&copy; 2024 CECOGEC. Tous droits réservés.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>

    <!-- Script pour ajouter dynamiquement plus d'agents et matériels -->
    <script>
        document.getElementById('add-agent').addEventListener('click', function() {
            const agentGroup = document.querySelector('.agent-group').cloneNode(true);
            document.getElementById('agents-container').appendChild(agentGroup);
        });

        document.getElementById('add-materiel').addEventListener('click', function() {
            const materielGroup = document.querySelector('.materiel-group').cloneNode(true);
            document.getElementById('materiels-container').appendChild(materielGroup);
        });
    </script>
</body>
</html>
