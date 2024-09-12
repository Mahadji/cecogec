<?php
include 'config.php';

function getServices($conn) {
    $sql = "SELECT * FROM services";
    $result = $conn->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}

function getAgents($conn) {
    $sql = "SELECT * FROM agents";
    $result = $conn->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}

function getMateriels($conn) {
    $sql = "SELECT * FROM materiels";
    $result = $conn->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}
?>
