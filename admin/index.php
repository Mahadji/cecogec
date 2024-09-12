<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CECOGEC - Tableau de Bord Administratif</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">CECOGEC Admin</a>
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
                    <a class="nav-link" href="logout.php">Déconnexion</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mt-4">
        <div class="row">
            <!-- Card for Agents Management -->
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Gestion des Agents</h5>
                        <p class="card-text">Ajouter, modifier ou supprimer des agents.</p>
                        <a href="manage_agents.php" class="btn btn-primary">Gérer les Agents</a>
                    </div>
                </div>
            </div>
            
            <!-- Card for Materiels Management -->
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Gestion des Matériels</h5>
                        <p class="card-text">Ajouter, modifier ou supprimer des matériels.</p>
                        <a href="manage_materiels.php" class="btn btn-primary">Gérer les Matériels</a>
                    </div>
                </div>
            </div>
            
            <!-- Card for Services Management -->
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Gestion des Services</h5>
                        <p class="card-text">Ajouter, modifier ou supprimer des services.</p>
                        <a href="manage_services.php" class="btn btn-primary">Gérer les Services</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <!-- Card for Interventions -->
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Gestion des Interventions</h5>
                        <p class="card-text">Voir et gérer les interventions en cours.</p>
                        <a href="manage_interventions.php" class="btn btn-primary">Gérer les Interventions</a>
                    </div>
                </div>
            </div>

            <!-- Card for Reports -->
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Rapports</h5>
                        <p class="card-text">Voir les rapports et statistiques.</p>
                        <a href="reports.php" class="btn btn-primary">Voir les Rapports</a>
                    </div>
                </div>
            </div>

            <!-- Card for Settings -->
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Paramètres</h5>
                        <p class="card-text">Configurer les paramètres de l'application.</p>
                        <a href="settings.php" class="btn btn-primary">Configurer</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3 mt-4">
        <p>&copy; 2024 CECOGEC. Tous droits réservés.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
</body>
</html>
