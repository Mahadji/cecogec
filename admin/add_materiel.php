<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Matériel - CECOGEC Admin</title>
    <!-- CSS de Bootstrap 5 -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- CSS spécifique au thème TPro -->
    <link rel="stylesheet" href="../css/tpro-theme.css">
    <!-- CSS personnalisé -->
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
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
                    <a class="nav-link active" href="add_materiel.php">Ajouter Matériel</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="add_service.php">Ajouter Service</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="add_intervention.php">Ajouter Intervention</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Déconnexion</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="container-fluid">
        <div class="row">
            <aside class="col-md-2 bg-light p-3">
                <div class="list-group">
                    <a href="index.php" class="list-group-item list-group-item-action">Tableau de Bord</a>
                    <a href="add_agent.php" class="list-group-item list-group-item-action">Ajouter Agent</a>
                    <a href="add_materiel.php" class="list-group-item list-group-item-action active">Ajouter Matériel</a>
                    <a href="add_service.php" class="list-group-item list-group-item-action">Ajouter Service</a>
                    <a href="add_intervention.php" class="list-group-item list-group-item-action">Ajouter Intervention</a>
                    <a href="logout.php" class="list-group-item list-group-item-action">Déconnexion</a>
                </div>
            </aside>

            <!-- Main Content -->
            <main class="col-md-10">
                <div class="container mt-4">
                    <h2 class="mb-4">Ajouter un Matériel</h2>
                    <form action="add_materiel_process.php" method="POST">
                        <div class="mb-3">
                            <label for="nom" class="form-label">Nom du Matériel</label>
                            <input type="text" class="form-control" id="nom" name="nom" required>
                        </div>

                        <div class="mb-3">
                            <label for="type" class="form-label">Type de Matériel</label>
                            <select class="form-select" id="type" name="type" required>
                                <option value="Véhicule">Véhicule</option>
                                <option value="Arme">Arme</option>
                                <option value="Autre">Autre</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="statut" class="form-label">Statut</label>
                            <select class="form-select" id="statut" name="statut" required>
                                <option value="Disponible">Disponible</option>
                                <option value="En Intervention">En Intervention</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="service_id" class="form-label">Service Associé</label>
                            <select class="form-select" id="service_id" name="service_id" required>
                                <option selected disabled>Choisir un service...</option>
                                <?php
                                include '../includes/database.php';
                                $services = getServices($conn);
                                foreach ($services as $service) {
                                    echo "<option value='{$service['id']}'>{$service['nom']}</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Enregistrer le Matériel</button>
                    </form>
                </div>
            </main>
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
