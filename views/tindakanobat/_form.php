<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Tindakanobat $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="tindakanobat-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pendaftaran_id')->textInput() ?>

    <?= $form->field($model, 'tindakan_id')->textInput() ?>

    <?= $form->field($model, 'obat_id')->textInput() ?>

    <?= $form->field($model, 'quantity')->textInput() ?>

    <?= $form->field($model, 'total_cost')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
