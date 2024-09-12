<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord - CECOGEC</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
        }
        /* Sidebar styling */
        .sidebar {
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #343a40;
            padding-top: 20px;
            width: 250px;
        }
        .sidebar a {
            color: #fff;
            padding: 15px;
            text-decoration: none;
            display: block;
            font-size: 1.1rem;
        }
        .sidebar a:hover {
            background-color: #495057;
        }
        /* Main content styling */
        .content {
            margin-left: 250px;
            padding: 20px;
        }
        .header {
            background-color: #fff;
            padding: 15px;
            border-bottom: 1px solid #eaeaea;
        }
        .header .notifications {
            float: right;
        }
        .header .notifications i {
            font-size: 1.5rem;
            margin-right: 20px;
            color: #495057;
        }
        .dashboard-cards {
            display: flex;
            justify-content: space-between;
        }
        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        .card h5 {
            font-weight: bold;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h3 class="text-center text-white">CECOGEC</h3>
        <a href="dashboard.php"><i class="bi bi-speedometer2"></i> Tableau de bord</a>
        <a href="interventions.php"><i class="bi bi-lightning-fill"></i> Interventions</a>
        <a href="map.php"><i class="bi bi-geo-alt-fill"></i> Carte des Services</a>
        <a href="reports.php"><i class="bi bi-bar-chart-fill"></i> Rapports</a>
        <a href="settings.php"><i class="bi bi-gear-fill"></i> Paramètres</a>
        <a href="logout.php"><i class="bi bi-box-arrow-right"></i> Déconnexion</a>
    </div>

    <!-- Main Content -->
    <div class="content">
        <!-- Header -->
        <div class="header">
            <h4>Tableau de bord</h4>
            <div class="notifications">
                <i class="bi bi-bell-fill"></i>
                <i class="bi bi-person-circle"></i>
            </div>
        </div>

        <!-- Dashboard Cards -->
        <div class="dashboard-cards row mt-4">
            <div class="col-md-3">
                <div class="card p-3">
                    <h5>Total Interventions</h5>
                    <p class="text-muted">120</p>
                    <i class="bi bi-lightning-fill text-warning" style="font-size: 2rem;"></i>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card p-3">
                    <h5>Agents Disponibles</h5>
                    <p class="text-muted">45</p>
                    <i class="bi bi-people-fill text-primary" style="font-size: 2rem;"></i>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card p-3">
                    <h5>Matériels Actifs</h5>
                    <p class="text-muted">30</p>
                    <i class="bi bi-tools text-success" style="font-size: 2rem;"></i>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card p-3">
                    <h5>Nouvelles Alertes</h5>
                    <p class="text-muted">5</p>
                    <i class="bi bi-exclamation-circle-fill text-danger" style="font-size: 2rem;"></i>
                </div>
            </div>
        </div>

        <!-- Charts Section -->
        <div class="row mt-5">
            <div class="col-md-6">
                <div class="card p-4">
                    <h5 class="mb-4">Statistiques des Interventions</h5>
                    <canvas id="interventionsChart"></canvas>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card p-4">
                    <h5 class="mb-4">Disponibilité des Matériels</h5>
                    <canvas id="materialsChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Script for charts 
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Interventions Chart
        const ctx1 = document.getElementById('interventionsChart').getContext('2d');
        const interventionsChart = new Chart(ctx1, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'Nombre d\'Interventions',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Materials Chart
        const ctx2 = document.getElementById('materialsChart').getContext('2d');
        const materialsChart = new Chart(ctx2, {
            type: 'pie',
            data: {
                labels: ['Disponible', 'En Utilisation', 'Maintenance'],
                datasets: [{
                    data: [10, 5, 15],
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(54, 162, 235, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(54, 162, 235, 1)'
                    ],
                    borderWidth: 1
                }]
            }
        });
    </script> -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
</body>
</html>
