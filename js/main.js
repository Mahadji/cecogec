<script>
    function calculateSolarSizing() {
        const dailyConsumption = parseFloat(document.getElementById('dailyConsumption').value);
        const sunHours = parseFloat(document.getElementById('sunHours').value);
        const panelEfficiency = parseFloat(document.getElementById('panelEfficiency').value) / 100;
        const panelWattage = parseFloat(document.getElementById('panelWattage').value);
        const batteryCapacity = parseFloat(document.getElementById('batteryCapacity').value);
        const batteryVoltage = parseFloat(document.getElementById('batteryVoltage').value);

        // Calcul de la puissance solaire nécessaire
        const totalWattHoursPerDay = dailyConsumption * 1000;
        const requiredPanels = Math.ceil(totalWattHoursPerDay / (panelWattage * sunHours * panelEfficiency));
        
        // Calcul de la capacité de la batterie nécessaire
        const totalBatteryCapacityRequired = totalWattHoursPerDay / batteryVoltage;
        const requiredBatteries = Math.ceil(totalBatteryCapacityRequired / batteryCapacity);

        // Afficher les résultats
        const resultsDiv = document.getElementById('results');
        resultsDiv.innerHTML = `
            <h2>Résultats du Dimensionnement</h2>
            <p>Nombre de panneaux solaires nécessaires: ${requiredPanels}</p>
            <p>Nombre de batteries nécessaires: ${requiredBatteries}</p>
        `;
    }
</script>
