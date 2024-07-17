<?php

use app\models\Tindakanobat;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\TindakanobatSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Tindakanobats';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tindakanobat-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php if (Yii::$app->user->can('admin')) : ?>
            <?= Html::a('Create', ['create'], ['class' => 'btn btn-success']) ?>
        <?php endif; ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'pendaftaran_id',
                'value' => 'pendaftaran_id',
            ],
            [
                'attribute' => 'pendaftaran_id',
                'value' => 'pendaftaran.pasien.name',
                'label' => 'Nama Pasien'
            ],
            [
                'attribute' => 'tindakan_id',
                'value' => 'tindakan.name',
            ],
            [
                'attribute' => 'obat_id',
                'value' => 'obat.name',
            ],
            // 'quantity',
            'total_cost',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Tindakanobat $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>


</div>