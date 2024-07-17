<?php

use yii\web\JsExpression;

/* @var $this yii\web\View */
/* @var $pendaftaranData array */

$this->title = 'Laporan Pendaftaran Pasien';
$this->params['breadcrumbs'][] = $this->title;

$labels = [];
$data = [];

foreach ($pendaftaranData as $dataPoint) {
    $labels[] = $dataPoint['tanggal_daftar'];
    $data[] = $dataPoint['jumlah'];
}

$labels = json_encode($labels);
$data = json_encode($data);
?>

<div class="laporan-index">
    <h1><?= $this->title ?></h1>
    <canvas id="myChart"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?= $labels ?>,
            datasets: [{
                label: 'Jumlah Pendaftaran Pasien',
                data: <?= $data ?>,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
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
});
</script>
