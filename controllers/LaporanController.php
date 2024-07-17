<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\Pendaftaran;

class LaporanController extends Controller
{
    public function actionIndex()
    {
        // Mengambil data pendaftaran
        $pendaftaranData = Pendaftaran::find()
            ->select(['tanggal_daftar', 'COUNT(*) AS jumlah'])
            ->groupBy('tanggal_daftar')
            ->orderBy('tanggal_daftar')
            ->asArray()
            ->all();

        return $this->render('index', [
            'pendaftaranData' => $pendaftaranData,
        ]);
    }
}
