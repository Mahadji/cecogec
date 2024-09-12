<?php
include '../includes/config.php';

$nom = $_POST['nom'];
$type = $_POST['type'];
$statut = $_POST['statut'];
$service_id = $_POST['service_id'];

$stmt = $conn->prepare("INSERT INTO materiels (nom, type, statut, service_id) VALUES (?, ?, ?, ?)");
$stmt->bind_param("sssi", $nom, $type, $statut, $service_id);

if ($stmt->execute()) {
    echo "Matériel enregistré avec succès.";
} else {
    echo "Erreur : " . $conn->error;
}

$stmt->close();
$conn->close();
?>
