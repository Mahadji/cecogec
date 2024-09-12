<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agents et Matériels Libres - CECOGEC Admin</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">CECOGEC Admin</a>
        <!-- Autres éléments de navigation ici -->
    </nav>

    <!-- Contenu Principal -->
    <div class="container mt-4">
        <h2>Agents et Matériels Libres</h2>

        <!-- Agents Libres -->
        <h3>Agents Libres</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Statut</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Connexion à la base de données
                $conn = new mysqli("localhost", "root", "", "cecogec");
                if ($conn->connect_error) {
                    die("Échec de la connexion : " . $conn->connect_error);
                }

                // Récupérer les agents libres
                $result = $conn->query("SELECT id, nom, prenom FROM agents WHERE id NOT IN 
                                        (SELECT agent_id FROM intervention_agents)");

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['nom']}</td>
                                <td>{$row['prenom']}</td>
                                <td>Libre</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='4' class='text-center'>Aucun agent libre.</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>

        <!-- Matériels Libres -->
        <h3>Matériels Libres</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Statut</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Reconnexion à la base de données
                $conn = new mysqli("localhost", "root", "", "cecogec");
                if ($conn->connect_error) {
                    die("Échec de la connexion : " . $conn->connect_error);
                }

                // Récupérer les matériels libres
                $result = $conn->query("SELECT id, nom FROM materiels WHERE id NOT IN 
                                        (SELECT materiel_id FROM intervention_materiels)");

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['nom']}</td>
                                <td>Libre</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='3' class='text-center'>Aucun matériel libre.</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3 mt-4">
        <p>&copy; 2024 CECOGEC. Tous droits réservés.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
</body>
</html>
