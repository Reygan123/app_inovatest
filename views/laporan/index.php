<?php

use yii\helpers\Html;
use yii\web\JsExpression;

/* @var $this yii\web\View */
/* @var $pendaftaranData array */
/* @var $pasienData array */

$this->title = 'Laporan Pendaftaran Pasien';
$this->params['breadcrumbs'][] = $this->title;

// Data untuk grafik pendaftaran
$labelsPendaftaran = [];
$dataPendaftaran = [];

foreach ($pendaftaranData as $dataPoint) {
    $labelsPendaftaran[] = $dataPoint['tanggal_daftar'];
    $dataPendaftaran[] = $dataPoint['jumlah'];
}

// Data untuk grafik pasien
$labelsPasien = [];
$dataPasien = [];

foreach ($pasienData as $dataPoint) {
    $labelsPasien[] = 'Pasien ' . $dataPoint['id']; // Ganti sesuai kebutuhan
    $dataPasien[] = $dataPoint['jumlah'];
}

$labelsPendaftaran = json_encode($labelsPendaftaran);
$dataPendaftaran = json_encode($dataPendaftaran);
$labelsPasien = json_encode($labelsPasien);
$dataPasien = json_encode($dataPasien);
?>

<div class="laporan-index">
    <h1><?= $this->title ?></h1>

    <canvas id="pendaftaranChart"></canvas>
    <canvas id="pasienChart"></canvas>

    <h2>Data Pendaftaran</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Tanggal Daftar</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pendaftaranData as $dataPoint): ?>
                <tr>
                    <td><?= Html::encode($dataPoint['tanggal_daftar']) ?></td>
                    <td><?= Html::encode($dataPoint['jumlah']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>Data Pasien</h2>
    <table class="table">
        <thead>
            <tr>
                <th>ID Pasien</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pasienData as $dataPoint): ?>
                <tr>
                    <td><?= Html::encode($dataPoint['id']) ?></td>
                    <td><?= Html::encode($dataPoint['jumlah']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    // Grafik untuk data pendaftaran
    var ctxPendaftaran = document.getElementById('pendaftaranChart').getContext('2d');
    var pendaftaranChart = new Chart(ctxPendaftaran, {
        type: 'bar',
        data: {
            labels: <?= $labelsPendaftaran ?>,
            datasets: [{
                label: 'Jumlah Pendaftaran Pasien',
                data: <?= $dataPendaftaran ?>,
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

    // Grafik untuk data pasien
    var ctxPasien = document.getElementById('pasienChart').getContext('2d');
    var pasienChart = new Chart(ctxPasien, {
        type: 'bar',
        data: {
            labels: <?= $labelsPasien ?>,
            datasets: [{
                label: 'Jumlah Pasien',
                data: <?= $dataPasien ?>,
                backgroundColor: 'rgba(153, 102, 255, 0.2)',
                borderColor: 'rgba(153, 102, 255, 1)',
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
