<?php

use app\models\Pasien;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Pendaftaran $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pendaftaran-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pasien_id')->dropDownList(
        Pasien::find()->select(['id', 'name'])->indexBy('id')->column(), 
        ['prompt' => 'Pilih Pasien']
    ) ?>

    <?= $form->field($model, 'tanggal_daftar')->input('date') ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
