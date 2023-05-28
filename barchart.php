<?php
include('koneksi.php');

$country = array();
$total_cases = array();
$total_deaths = array();
$total_recovered = array();
$active_cases = array();
$total_test = array();

$data = mysqli_query($koneksi, "SELECT * FROM tb_covid");

while($row = mysqli_fetch_array($data)) {
    $country[] = $row['country'];

    $query = mysqli_query($koneksi, "SELECT total_cases, total_deaths, total_recovered, active_cases, total_test FROM tb_covid WHERE id_covid = '".$row['id_covid']."'");

    $row = $query->fetch_array();
    $total_cases[] = $row['total_cases'];
    $total_deaths[] = $row['total_deaths'];
    $total_recovered[] = $row['total_recovered'];
    $active_cases[] = $row['active_cases'];
    $total_test[] = $row['total_test'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Grafik Covid - Bar Chart</title>
    <script type="text/javascript" src="Chart.js"></script>
</head>
<body>
    <div style="width: 800px;height: 800px">
        <canvas id="totalCasesChart"></canvas>
    </div>
    <div style="width: 800px;height: 800px">
        <canvas id="totalDeathsChart"></canvas>
    </div>
    <div style="width: 800px;height: 800px">
        <canvas id="totalRecoveredChart"></canvas>
    </div>
    <div style="width: 800px;height: 800px">
        <canvas id="activeCasesChart"></canvas>
    </div>
    <div style="width: 800px;height: 800px">
        <canvas id="totalTestsChart"></canvas>
    </div>

    <script>
    var ctxTotalCases = document.getElementById("totalCasesChart").getContext('2d');
    var totalCasesChart = new Chart(ctxTotalCases, {
        type: 'bar',
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

    var ctxTotalDeaths = document.getElementById("totalDeathsChart").getContext('2d');
    var totalDeathsChart = new Chart(ctxTotalDeaths, {
        type: 'bar',
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

    var ctxTotalRecovered = document.getElementById("totalRecoveredChart").getContext('2d');
    var totalRecoveredChart = new Chart(ctxTotalRecovered, {
        type: 'bar',
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

    var ctxActiveCases = document.getElementById("activeCasesChart").getContext('2d');
    var activeCasesChart = new Chart(ctxActiveCases, {
        type: 'bar',
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

    var ctxTotalTests = document.getElementById("totalTestsChart").getContext('2d');
    var totalTestsChart = new Chart(ctxTotalTests, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($country); ?>,
            datasets: [{
                label: 'Grafik Total Test Covid-19',
                data: <?php echo json_encode($total_test); ?>,
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
