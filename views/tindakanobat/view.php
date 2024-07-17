<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Tindakanobat $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tindakanobats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tindakanobat-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'pendaftaran_id',
                'value' => $model->pendaftaran->pasien->name,
                'label' => 'Nama Pasien',
            ],
            [
                'attribute' => 'tindakan_id',
                'value' => $model->tindakan->name,
                'label' => 'Jenis Tindakan',
            ],
            [
                'attribute' => 'obat_id',
                'value' => $model->obat->name,
                'label' => 'Nama Obat',
            ],
            'quantity',
            'total_cost',
        ],
    ]) ?>

</div>
