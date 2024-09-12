<?php
// Connexion à la base de données
$conn = new mysqli("localhost", "root", "", "cecogec");

// Vérifier la connexion
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

// Récupérer les données du formulaire
$service_id = $_POST['service_id'];
$date_intervention = $_POST['date_intervention'];
$motif = $_POST['motif'];
$agent_ids = $_POST['agent_ids'];  // Tableau des agents sélectionnés
$materiel_ids = $_POST['materiel_ids'];  // Tableau des matériels sélectionnés

// Insérer l'intervention dans la table `interventions`
$stmt = $conn->prepare("INSERT INTO interventions (service_id, date_intervention, motif, statut) VALUES (?, ?, ?, 'En Cours')");
$stmt->bind_param("iss", $service_id, $date_intervention, $motif);
$stmt->execute();

// Obtenir l'ID de la dernière intervention insérée
$intervention_id = $conn->insert_id;

// Insérer les agents dans la table `intervention_agents`
foreach ($agent_ids as $agent_id) {
    $stmt = $conn->prepare("INSERT INTO intervention_agents (intervention_id, agent_id) VALUES (?, ?)");
    $stmt->bind_param("ii", $intervention_id, $agent_id);
    $stmt->execute();
}

// Insérer les matériels dans la table `intervention_materiels`
foreach ($materiel_ids as $materiel_id) {
    $stmt = $conn->prepare("INSERT INTO intervention_materiels (intervention_id, materiel_id) VALUES (?, ?)");
    $stmt->bind_param("ii", $intervention_id, $materiel_id);
    $stmt->execute();
}

// Fermer la connexion
$stmt->close();
$conn->close();

// Rediriger vers une page de confirmation ou afficher un message de succès
header("Location: interventions_en_cours.php");
exit;
?>
