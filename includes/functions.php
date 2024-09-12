<?php
// Fonctions supplémentaires pour la gestion des données
function updateAgent($conn, $id, $disponible) {
    $stmt = $conn->prepare("UPDATE agents SET disponible = ? WHERE id = ?");
    $stmt->bind_param("ii", $disponible, $id);
    return $stmt->execute();
}

function updateMateriel($conn, $id, $statut) {
    $stmt = $conn->prepare("UPDATE materiels SET statut = ? WHERE id = ?");
    $stmt->bind_param("si", $statut, $id);
    return $stmt->execute();
}
?>
