<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Tindakanobat $model */

$this->title = 'Update Tindakanobat: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tindakanobats', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tindakanobat-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
