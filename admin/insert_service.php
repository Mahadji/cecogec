<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cecogec"; // Assurez-vous que ce nom de base de données est correct

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Échec de la connexion: " . $conn->connect_error);
}

// Récupération des données du formulaire
$serviceName = $_POST['serviceName'];
$serviceType = $_POST['serviceType'];
$serviceAddress = $_POST['serviceAddress'];
$serviceContact = $_POST['serviceContact'];
$serviceEmail = $_POST['serviceEmail'];
$serviceGPS = $_POST['serviceGPS'];

// Préparation et exécution de la requête SQL pour insérer les données
$sql = "INSERT INTO services (nom, type, adresse, contact, email, gps)
        VALUES (?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssss", $serviceName, $serviceType, $serviceAddress, $serviceContact, $serviceEmail, $serviceGPS);

if ($stmt->execute()) {
    echo "<script>alert('Service ajouté avec succès!'); window.location.href='add_service.php';</script>";
} else {
    echo "Erreur: " . $sql . "<br>" . $conn->error;
}

// Fermeture de la connexion
$stmt->close();
$conn->close();
?>
