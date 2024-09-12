<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Agent - CECOGEC Admin</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }
        /* Sidebar Styling */
        .sidebar {
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #343a40;
            padding-top: 20px;
            width: 250px;
        }
        .sidebar a {
            color: #fff;
            padding: 15px;
            text-decoration: none;
            display: block;
            font-size: 1.1rem;
        }
        .sidebar a:hover, .sidebar a.active {
            background-color: #495057;
        }
        /* Main content */
        .content {
            margin-left: 250px;
            padding: 20px;
        }
        .navbar-brand {
            font-weight: bold;
        }
        footer {
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h3 class="text-center text-white">CECOGEC</h3>
        <a href="index.php" class="bi bi-speedometer2"> Tableau de bord</a>
        <a href="add_agent.php" class="active bi bi-person-plus-fill"> Ajouter Agent</a>
        <a href="add_materiel.php" class="bi bi-tools"> Ajouter Matériel</a>
        <a href="add_service.php" class="bi bi-building"> Ajouter Service</a>
        <a href="add_intervention.php" class="bi bi-lightning-fill"> Ajouter Intervention</a>
        <a href="logout.php" class="bi bi-box-arrow-right"> Déconnexion</a>
    </div>

    <!-- Main Content -->
    <div class="content">
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm mb-4">
            <div class="container-fluid">
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
                            <a class="nav-link active" href="add_agent.php">Ajouter Agent</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="add_materiel.php">Ajouter Matériel</a>
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
            </div>
        </nav>

        <!-- Formulaire d'ajout d'agent -->
        <div class="container">
            <h2 class="mb-4">Ajouter un Agent</h2>
            <div class="card p-4 shadow-sm">
                <form action="add_agent_process.php" method="POST">
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom de l'Agent</label>
                        <input type="text" class="form-control" id="nom" name="nom" placeholder="Entrer le nom" required>
                    </div>

                    <div class="mb-3">
                        <label for="prenom" class="form-label">Prénom</label>
                        <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Entrer le prénom" required>
                    </div>

                    <div class="mb-3">
                        <label for="grade" class="form-label">Grade</label>
                        <input type="text" class="form-control" id="grade" name="grade" placeholder="Entrer le grade" required>
                    </div>

                    <div class="mb-3">
                        <label for="contact" class="form-label">Contact</label>
                        <input type="text" class="form-control" id="contact" name="contact" placeholder="Entrer le contact" required>
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

                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="disponible" name="disponible" checked>
                        <label class="form-check-label" for="disponible">Disponible</label>
                    </div>

                    <button type="submit" class="btn btn-primary">Enregistrer l'Agent</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3">
        <p>&copy; 2024 CECOGEC. Tous droits réservés.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
</body>
</html>
