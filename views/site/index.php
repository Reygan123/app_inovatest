<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'Inova Test';
?>
<div class="site-index">
    <div class="body-content">

        <div class="row">
            <?php if (!Yii::$app->user->isGuest && Yii::$app->authManager->checkAccess(Yii::$app->user->id, 'user')) : ?>
                <div class="col-md-12">
                    <div class="alert alert-info">
                        Kamu login sebagai user
                    </div>
                    <div class="landing-page">
                        <h2>Sistem Informasi Klinik</h2>
                        <p>Sistem yang dirancang untuk memudahkan dalam mengelola data klinik</p>

                        <h3>Fitur Kami:</h3>
                        <ul>
                            <li><?= Html::a('Daftar Obat', ['obat/index'], ['class' => 'link']) ?></li>
                            <li><?= Html::a('Daftar Pegawai', ['pegawai/index'], ['class' => 'link']) ?></li>
                            <li><?= Html::a('Informasi Pasien', ['pasien/index'], ['class' => 'link']) ?></li>
                            <li><?= Html::a('Informasi Pembayaran', ['pembayaran/index'], ['class' => 'link']) ?></li>
                        </ul>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <div class="row">
            <?php if (!Yii::$app->user->isGuest && Yii::$app->authManager->checkAccess(Yii::$app->user->id, 'admin')) : ?>
                <div class="col-md-12">
                    <div class="alert alert-success">
                        Kamu login sebagai admin
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <div class="card mb-4 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">Kelola Obat</h5>
                                <p class="card-text">Manajemen data obat.</p>
                                <?= Html::a('Kelola Obat', ['obat/index'], ['class' => 'btn btn-link']) ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card mb-4 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">Kelola Pegawai</h5>
                                <p class="card-text">Manajemen data pegawai.</p>
                                <?= Html::a('Kelola Pegawai', ['pegawai/index'], ['class' => 'btn btn-link']) ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card mb-4 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">Kelola Pasien</h5>
                                <p class="card-text">Manajemen data pasien.</p>
                                <?= Html::a('Kelola Pasien', ['pasien/index'], ['class' => 'btn btn-link']) ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card mb-4 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">Kelola Pembayaran</h5>
                                <p class="card-text">Manajemen data pembayaran.</p>
                                <?= Html::a('Kelola Pembayaran', ['pembayaran/index'], ['class' => 'btn btn-link']) ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card mb-4 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">Kelola Pendaftaran</h5>
                                <p class="card-text">Manajemen data pendaftaran.</p>
                                <?= Html::a('Kelola Pendaftaran', ['pendaftaran/index'], ['class' => 'btn btn-link']) ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card mb-4 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">Kelola Tindakan</h5>
                                <p class="card-text">Manajemen data tindakan.</p>
                                <?= Html::a('Kelola Tindakan', ['tindakan/index'], ['class' => 'btn btn-link']) ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card mb-4 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">Kelola Wilayah</h5>
                                <p class="card-text">Manajemen data wilayah.</p>
                                <?= Html::a('Kelola Wilayah', ['wilayah/index'], ['class' => 'btn btn-link']) ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card mb-4 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">Kelola Tindakan Pasien</h5>
                                <p class="card-text">Manajemen data tindakan dan obat pada pasien.</p>
                                <?= Html::a('Kelola Tindakan Pasien', ['tindakanobat/index'], ['class' => 'btn btn-link']) ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>

    </div>
</div>