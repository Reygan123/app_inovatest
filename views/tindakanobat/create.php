<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Tindakanobat $model */

$this->title = 'Create Tindakanobat';
$this->params['breadcrumbs'][] = ['label' => 'Tindakanobats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tindakanobat-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
