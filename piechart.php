<?php
include('koneksi.php');
$data = mysqli_query($koneksi, "SELECT * FROM tb_covid");
$casesData = [];
$totalDeathsData = [];
$recoveredData = [];
$activeCasesData = [];
$totalTestData = [];
$countryData = [];

while ($row = mysqli_fetch_array($data)) {
    $countryData[] = $row['country'];
    $casesData[] = $row['total_cases'];
    $totalDeathsData[] = $row['total_deaths'];
    $recoveredData[] = $row['total_recovered'];
    $activeCasesData[] = $row['active_cases'];
    $totalTestData[] = $row['total_test'];
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Grafik Covid-19</title>
    <script type="text/javascript" src="Chart.js"></script>
</head>

<body>
    <div id="canvas-holder" style="width:50%">
    <h3 style="margin-left: 29%">Grafik Total Cases Covid-19</h3>
    <canvas id="chart-total-cases"></canvas>
    <h3 style="margin-left: 29%">Grafik Total Deaths Covid-19</h3>
    <canvas id="chart-total-deaths"></canvas>
    <h3 style="margin-left: 26%">Grafik Total Recovered Covid-19</h3>
    <canvas id="chart-total-recovered"></canvas>
    <h3 style="margin-left: 29%">Grafik Active Cases Covid-19</h3>
    <canvas id="chart-active-cases"></canvas>
    <h3 style="margin-left: 31%">Grafik Total Test Covid-19</h3>
    <canvas id="chart-total-tests"></canvas>
    </div>

    <script>
        var countryData = <?php echo json_encode($countryData); ?>;
        var casesData = <?php echo json_encode($casesData); ?>;
        var totalDeathsData = <?php echo json_encode($totalDeathsData); ?>;
        var recoveredData = <?php echo json_encode($recoveredData); ?>;
        var activeCasesData = <?php echo json_encode($activeCasesData); ?>;
        var totalTestData = <?php echo json_encode($totalTestData); ?>;

        // Chart for Total Cases
        var ctx1 = document.getElementById('chart-total-cases').getContext('2d');
        new Chart(ctx1, {
            type: 'pie',
            data: {
                labels: countryData,
                datasets: [{
                    data: casesData,
                    backgroundColor: [
                         'rgba(205, 92, 92, 1)',
                         'rgba(75, 0, 130, 1 )',
                         'rgba(255, 255, 0, 1)',
                         'rgba(100, 149, 237, 1)',
                         'rgba(154, 205, 50, 1)',
                         'rgba(220, 20, 60, 1)',
                         'rgba(255, 165, 0, 1)',
                         'rgba(0, 255, 127, 1)',
                         'rgba(32, 178, 170, 1)',
                         'rgba(0, 255, 255, 1)'
                     ],
                     borderColor: [
                         'rgba(205, 92, 92, 1)',
                         'rgba(75, 0, 130, 1 )',
                         'rgba(255, 255, 0, 1)',
                         'rgba(100, 149, 237, 1)',
                         'rgba(154, 205, 50, 1)',
                         'rgba(220, 20, 60, 1)',
                         'rgba(255, 165, 0, 1)',
                         'rgba(0, 255, 127, 1)',
                         'rgba(32, 178, 170, 1)',
                         'rgba(0, 255, 255, 1)'
                    ],
                    label: 'Total Cases Covid-19'
                }]
            },
            options: {
                responsive: true
            }
        });

        // Chart for Total Deaths
        var ctx2 = document.getElementById('chart-total-deaths').getContext('2d');
        new Chart(ctx2, {
            type: 'pie',
            data: {
                labels: countryData,
                datasets: [{
                    data: totalDeathsData,
                    backgroundColor: [
                         'rgba(0, 0, 255, 1)',
                         'rgba(138, 43, 226, 1)',
                         'rgba(165, 42, 42, 1)',
                         'rgba(222, 184, 135, 1)',
                         'rgba(95, 158, 160, 1)',
                         'rgba(127, 255, 0, 1)',
                         'rgba(210, 105, 30, 1)',
                         'rgba(220, 20, 60, 1)',
                         'rgba(100, 149, 237, 1)',
                         'rgba(0, 255, 255, 1)'
                     ],
                     borderColor: [
                         'rgba(0, 0, 255, 1)',
                         'rgba(138, 43, 226, 1)',
                         'rgba(165, 42, 42, 1)',
                         'rgba(222, 184, 135, 1)',
                         'rgba(95, 158, 160, 1)',
                         'rgba(127, 255, 0, 1)',
                         'rgba(210, 105, 30, 1)',
                         'rgba(220, 20, 60, 1)',
                         'rgba(100, 149, 237, 1)',
                         'rgba(0, 255, 255, 1)'
                    ],
                    label: 'Total Deaths Covid-19'
                }]
            },
            options: {
                responsive: true
            }
        });

        // Chart for Total Recovered
        var ctx3 = document.getElementById('chart-total-recovered').getContext('2d');
        new Chart(ctx3, {
            type: 'pie',
            data: {
                labels: countryData,
                datasets: [{
                    data: recoveredData,
                    backgroundColor: [
                        'rgba(0, 0, 139, 1)',
                        'rgba(0, 139, 139, 1)',
                        'rgba(184, 134, 11, 1)',
                        'rgba(169, 169, 169, 1)',
                        'rgba(0, 100, 0, 1)',
                        'rgba(189, 183, 107, 1)',
                        'rgba(139, 0, 139, 1)',
                        'rgba(33, 150, 122, 1)',
                        'rgba(139, 0, 0, 1)',
                        'rgba(143, 188, 143, 1)'
                    ],
                    borderColor: [
                        'rgba(0, 0, 139, 1)',
                        'rgba(0, 139, 139, 1)',
                        'rgba(184, 134, 11, 1)',
                        'rgba(169, 169, 169, 1)',
                        'rgba(0, 100, 0, 1)',
                        'rgba(189, 183, 107, 1)',
                        'rgba(139, 0, 139, 1)',
                        'rgba(33, 150, 122, 1)',
                        'rgba(139, 0, 0, 1)',
                        'rgba(143, 188, 143, 1)'
                    ],
                    label: 'Total Recovered Covid-19'
                }]
            },
            options: {
                responsive: true
            }
        });

        // Chart for Active Cases
        var ctx4 = document.getElementById('chart-active-cases').getContext('2d');
        new Chart(ctx4, {
            type: 'pie',
            data: {
                labels: countryData,
                datasets: [{
                    data: activeCasesData,
                    backgroundColor: [
                        'rgba(210, 180, 140, 1)',
                        'rgba(238, 130, 238, 1)',
                        'rgba(64, 224, 208, 1)',
                        'rgba(255, 99, 71, 1)',
                        'rgba(255, 255, 0, 1)',
                        'rgba(0, 128, 128, 1)',
                        'rgba(154, 205, 50, 1)',
                        'rgba(160, 82, 45, 1)',
                        'rgba(128, 0, 128, 1)',
                        'rgba(219, 112, 147, 1)'
                    ],
                    borderColor: [
                        'rgba(210, 180, 140, 1)',
                        'rgba(238, 130, 238, 1)',
                        'rgba(64, 224, 208, 1)',
                        'rgba(255, 99, 71, 1)',
                        'rgba(255, 255, 0, 1)',
                        'rgba(0, 128, 128, 1)',
                        'rgba(154, 205, 50, 1)',
                        'rgba(160, 82, 45, 1)',
                        'rgba(128, 0, 128, 1)',
                        'rgba(219, 112, 147, 1)'
                    ],
                    label: 'Active Cases Covid-19'
                }]
            },
            options: {
                responsive: true
            }
        });

        // Chart for Total Tests
        var ctx5 = document.getElementById('chart-total-tests').getContext('2d');
        new Chart(ctx5, {
            type: 'pie',
            data: {
                labels: countryData,
                datasets: [{
                    data: totalTestData,
                    backgroundColor: [
                        'rgba(255, 218, 185, 1)',
                        'rgba(210, 105, 30, 1)',
                        'rgba(154, 205, 50, 1)',
                        'rgba(138, 43, 226, 1)',
                        'rgba(221, 160, 221, 1)',
                        'rgba(255, 20, 147, 1)',
                        'rgba(100, 149, 237, 1)',
                        'rgba(255, 215, 0, 1)',
                        'rgba(152, 251, 152, 1)',
                        'rgba(64, 224, 208, 1)'
                    ],
                    borderColor: [
                        'rgba(255, 218, 185, 1)',
                        'rgba(210, 105, 30, 1)',
                        'rgba(154, 205, 50, 1)',
                        'rgba(138, 43, 226, 1)',
                        'rgba(221, 160, 221, 1)',
                        'rgba(255, 20, 147, 1)',
                        'rgba(100, 149, 237, 1)',
                        'rgba(255, 215, 0, 1)',
                        'rgba(152, 251, 152, 1)',
                        'rgba(64, 224, 208, 1)'
                    ],
                    label: 'Total Test Covid-19'
                }]
            },
            options: {
                responsive: true
            }
        });
    </script>
</body>

</html>
