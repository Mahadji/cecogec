<?php
include '../includes/database.php';
$services = getServices($conn);
$agents = getAgents($conn);
$materiels = getMateriels($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <h1>Dashboard</h1>
    <div>
        <h2>Services</h2>
        <!-- Afficher les services ici -->
    </div>
    <div>
        <h2>Agents</h2>
        <!-- Afficher les agents ici -->
    </div>
    <div>
        <h2>Matériels</h2>
        <!-- Afficher les matériels ici -->
    </div>
</body>
</html>
