<?php
include '../includes/config.php';

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$grade = $_POST['grade'];
$contact = $_POST['contact'];
$service_id = $_POST['service_id'];
$disponible = isset($_POST['disponible']) ? 1 : 0;

$stmt = $conn->prepare("INSERT INTO agents (nom, prenom, grade, contact, service_id, disponible) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssii", $nom, $prenom, $grade, $contact, $service_id, $disponible);

if ($stmt->execute()) {
    echo "Agent enregistré avec succès.";
} else {
    echo "Erreur : " . $conn->error;
}

$stmt->close();
$conn->close();
?>
