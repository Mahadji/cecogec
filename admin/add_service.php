<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Service d'Intervention - CECOGEC Admin</title>
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
                    <a class="nav-link active" href="add_service.php">Ajouter Service</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Déconnexion</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mt-4">
        <h2 class="mb-4">Ajouter un Service d'Intervention</h2>
        <form action="insert_service.php" method="POST">
            <div class="mb-3">
                <label for="serviceName" class="form-label">Nom du Service</label>
                <input type="text" class="form-control" id="serviceName" name="serviceName" placeholder="Nom du service" required>
            </div>

            <div class="mb-3">
                <label for="serviceType" class="form-label">Type de Service</label>
                <select class="form-select" id="serviceType" name="serviceType" required>
                    <option selected disabled>Choisir...</option>
                    <option value="Police">Police</option>
                    <option value="Gendarmerie">Gendarmerie</option>
                    <option value="Pompiers">Pompiers</option>
                    <option value="Garde Nationale">Garde Nationale</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="serviceAddress" class="form-label">Adresse</label>
                <input type="text" class="form-control" id="serviceAddress" name="serviceAddress" placeholder="Adresse du service" required>
            </div>

            <div class="mb-3">
                <label for="serviceContact" class="form-label">Contact</label>
                <input type="text" class="form-control" id="serviceContact" name="serviceContact" placeholder="Numéro de contact" required>
            </div>

            <div class="mb-3">
                <label for="serviceEmail" class="form-label">Adresse Email</label>
                <input type="email" class="form-control" id="serviceEmail" name="serviceEmail" placeholder="Email du service" required>
            </div>

            <div class="mb-3">
                <label for="serviceGPS" class="form-label">Coordonnées GPS</label>
                <input type="text" class="form-control" id="serviceGPS" name="serviceGPS" placeholder="Coordonnées GPS" required>
            </div>

            <button type="submit" class="btn btn-primary">Enregistrer le Service</button>
        </form>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3 mt-4">
        <p>&copy; 2024 CECOGEC. Tous droits réservés.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
</body>
</html>
