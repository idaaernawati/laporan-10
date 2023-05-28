<?php
include('koneksi.php');

// Query untuk Total Cases
$dataTotalCases = mysqli_query($koneksi, "SELECT * FROM tb_covid");
while ($row = mysqli_fetch_array($dataTotalCases)) {
    $country[] = $row['country'];
    $query = mysqli_query($koneksi, "SELECT total_cases FROM tb_covid WHERE id_covid='" . $row['id_covid'] . "'");
    $row = $query->fetch_array();
    $total_cases[] = $row['total_cases'];
}

// Query untuk Total Deaths
$dataTotalDeaths = mysqli_query($koneksi, "SELECT * FROM tb_covid");
while ($row = mysqli_fetch_array($dataTotalDeaths)) {
    $query = mysqli_query($koneksi, "SELECT total_deaths FROM tb_covid WHERE id_covid='" . $row['id_covid'] . "'");
    $row = $query->fetch_array();
    $total_deaths[] = $row['total_deaths'];
}

// Query untuk Total Recovered
$dataTotalRecovered = mysqli_query($koneksi, "SELECT * FROM tb_covid");
while ($row = mysqli_fetch_array($dataTotalRecovered)) {
    $query = mysqli_query($koneksi, "SELECT total_recovered FROM tb_covid WHERE id_covid='" . $row['id_covid'] . "'");
    $row = $query->fetch_array();
    $total_recovered[] = $row['total_recovered'];
}

// Query untuk Active Cases
$dataActiveCases = mysqli_query($koneksi, "SELECT * FROM tb_covid");
while ($row = mysqli_fetch_array($dataActiveCases)) {
    $query = mysqli_query($koneksi, "SELECT active_cases FROM tb_covid WHERE id_covid='" . $row['id_covid'] . "'");
    $row = $query->fetch_array();
    $active_cases[] = $row['active_cases'];
}

// Query untuk Total Tests
$dataTotalTests = mysqli_query($koneksi, "SELECT * FROM tb_covid");
while ($row = mysqli_fetch_array($dataTotalTests)) {
    $query = mysqli_query($koneksi, "SELECT total_test FROM tb_covid WHERE id_covid='" . $row['id_covid'] . "'");
    $row = $query->fetch_array();
    $total_tests[] = $row['total_test'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Grafik Covid - Line Chart</title>
    <script type="text/javascript" src="Chart.js"></script>
</head>
<body>
    <div style="display: flex; flex-wrap: wrap;">
        <div style="width: 400px; height: 400px;">
            <canvas id="totalCasesChart"></canvas>
        </div>
        <div style="width: 400px; height: 400px;">
            <canvas id="totalDeathsChart"></canvas>
        </div>
        <div style="width: 400px; height: 400px;">
            <canvas id="totalRecoveredChart"></canvas>
        </div>
        <div style="width: 400px; height: 400px;">
            <canvas id="activeCasesChart"></canvas>
        </div>
        <div style="width: 400px; height: 400px;">
            <canvas id="totalTestsChart"></canvas>
        </div>
    </div>

    <script>
    // Grafik Total Cases
    var totalCasesCtx = document.getElementById("totalCasesChart").getContext('2d');
    var totalCasesChart = new Chart(totalCasesCtx
, {
        type: 'line',
        data: {
            labels: <?php echo json_encode($country); ?>,
            datasets: [{
                label: 'Grafik Total Cases Covid-19',
                data: <?php echo json_encode($total_cases); ?>,
                backgroundColor: 'rgba(220, 20, 60, 1)',
                borderColor: 'rgba(30, 144, 255, 1)',
                borderWidth: 3
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });

    // Grafik Total Deaths
    var totalDeathsCtx = document.getElementById("totalDeathsChart").getContext('2d');
    var totalDeathsChart = new Chart(totalDeathsCtx, {
        type: 'line',
        data: {
            labels: <?php echo json_encode($country); ?>,
            datasets: [{
                label: 'Grafik Total Deaths Covid-19',
                data: <?php echo json_encode($total_deaths); ?>,
                backgroundColor: 'rgba(64, 224, 208, 1)',
                borderColor: 'rgba(70, 130, 180, 1)',
                borderWidth: 3
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });

    // Grafik Total Recovered
    var totalRecoveredCtx = document.getElementById("totalRecoveredChart").getContext('2d');
    var totalRecoveredChart = new Chart(totalRecoveredCtx, {
        type: 'line',
        data: {
            labels: <?php echo json_encode($country); ?>,
            datasets: [{
                label: 'Grafik Total Recovered Covid-19',
                data: <?php echo json_encode($total_recovered); ?>,
                backgroundColor: 'rgba(255, 255, 0, 1)',
                borderColor: 'rgba(147, 112, 219, 1)',
                borderWidth: 3
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });

    // Grafik Active Cases
    var activeCasesCtx = document.getElementById("activeCasesChart").getContext('2d');
    var activeCasesChart = new Chart(activeCasesCtx, {
        type: 'line',
        data: {
            labels: <?php echo json_encode($country); ?>,
            datasets: [{
                label: 'Grafik Active Cases Covid-19',
                data: <?php echo json_encode($active_cases); ?>,
                backgroundColor: 'rgba(173, 255, 47, 1)',
                borderColor: 'rgba(0, 128, 0, 1)',
                borderWidth: 3
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });

    // Grafik Total Tests
    var totalTestsCtx = document.getElementById("totalTestsChart").getContext('2d');
    var totalTestsChart = new Chart(totalTestsCtx, {
        type: 'line',
        data: {
            labels: <?php echo json_encode($country); ?>,
            datasets: [{
                label: 'Grafik Total Test Covid-19',
                data: <?php echo json_encode($total_tests); ?>,
                backgroundColor: 'rgba(165, 42, 42, 1)',
                borderColor: 'rgba(255, 127, 80, 1)',
                borderWidth: 3
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });

    </script>
</body>
</html>
