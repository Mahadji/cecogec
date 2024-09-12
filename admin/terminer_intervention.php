<?php
// Connexion à la base de données
$conn = new mysqli("localhost", "root", "", "cecogec");
if ($conn->connect_error) {
    die("Échec de la connexion: " . $conn->connect_error);
}

// Récupérer l'ID de l'intervention à partir de l'URL
$intervention_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Vérifier si un ID valide est fourni
if ($intervention_id == 0) {
    echo "Intervention non trouvée.";
    exit;
}

// Marquer l'intervention comme terminée
$update_intervention = "UPDATE interventions SET statut = 'Terminé' WHERE id = ?";
$stmt_intervention = $conn->prepare($update_intervention);
$stmt_intervention->bind_param("i", $intervention_id);
$stmt_intervention->execute();

// Libérer les agents assignés à l'intervention
$update_agents = "UPDATE agents
                  JOIN intervention_agents ON agents.id = intervention_agents.agent_id
                  SET agents.disponible = 1
                  WHERE intervention_agents.intervention_id = ?";
$stmt_agents = $conn->prepare($update_agents);
$stmt_agents->bind_param("i", $intervention_id);
$stmt_agents->execute();

// Libérer les matériels assignés à l'intervention
$update_materiels = "UPDATE materiels
                     JOIN intervention_materiels ON materiels.id = intervention_materiels.materiel_id
                     SET materiels.disponible = 1
                     WHERE intervention_materiels.intervention_id = ?";
$stmt_materiels = $conn->prepare($update_materiels);
$stmt_materiels->bind_param("i", $intervention_id);
$stmt_materiels->execute();

// Supprimer les associations entre les agents et les matériels avec l'intervention
$delete_agents = "DELETE FROM intervention_agents WHERE intervention_id = ?";
$stmt_delete_agents = $conn->prepare($delete_agents);
$stmt_delete_agents->bind_param("i", $intervention_id);
$stmt_delete_agents->execute();

$delete_materiels = "DELETE FROM intervention_materiels WHERE intervention_id = ?";
$stmt_delete_materiels = $conn->prepare($delete_materiels);
$stmt_delete_materiels->bind_param("i", $intervention_id);
$stmt_delete_materiels->execute();

// Fermer la connexion
$stmt_intervention->close();
$stmt_agents->close();
$stmt_materiels->close();
$stmt_delete_agents->close();
$stmt_delete_materiels->close();
$conn->close();

// Rediriger vers la page des interventions en cours
header("Location: interventions_en_cours.php");
exit;
?>
