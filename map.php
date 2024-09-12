<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carte des Services d'Intervention - CECOGEC</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css"> <!-- Assurez-vous que le chemin est correct -->
    <style>
        #map {
            height: 600px; /* Ajustez la hauteur selon vos besoins */
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">CECOGEC</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="interventions.php">Interventions</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="map.php">Carte des Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Déconnexion</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mt-4">
        <h2 class="mb-4">Carte des Services d'Intervention</h2>
        <div id="map"></div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3 mt-4">
        <p>&copy; 2024 CECOGEC. Tous droits réservés.</p>
    </footer>

    <!-- Leaflet JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.js"></script>
    <script>
        // Initialiser la carte
        var map = L.map('map').setView([12.6392, -8.0029], 13); // Coordonnées centrées sur Bamako, ajustez selon vos besoins

        // Ajouter la couche de la carte
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Fonction pour ajouter des marqueurs à la carte
        function addMarker(lat, lon, title) {
            L.marker([lat, lon]).addTo(map)
                .bindPopup(title)
                .openPopup();
        }

        // Connexion à la base de données et récupération des données
        <?php
        // Connexion à la base de données
        $conn = new mysqli("localhost", "root", "", "cecogec");
        if ($conn->connect_error) {
            die("Échec de la connexion: " . $conn->connect_error);
        }

        // Requête SQL pour récupérer les services
        $sql = "SELECT nom, latitude, longitude FROM services"; // Assurez-vous que les noms des colonnes correspondent à votre structure
        $result = $conn->query($sql);

        // Afficher les résultats dans le script JavaScript
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "addMarker(" . $row['latitude'] . ", " . $row['longitude'] . ", '" . $row['nom'] . "');\n";
            }
        }

        // Fermer la connexion
        $conn->close();
        ?>
    </script>
</body>
</html>
