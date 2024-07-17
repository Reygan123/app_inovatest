<?php

use app\models\Obat;
use app\models\Pendaftaran;
use app\models\Tindakan;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Tindakanobat $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="tindakanobat-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pendaftaran_id')->dropDownList(
        Pendaftaran::find()->select(['id'])->indexBy('id')->column(),
        ['prompt' => 'Pilih Pendaftaran']
    ) ?>

    <?= $form->field($model, 'tindakan_id')->dropDownList(
        Tindakan::find()->select(['id', 'name'])->indexBy('id')->column(),
        ['prompt' => 'Pilih Tindakan']
    ) ?>

    <?= $form->field($model, 'obat_id')->dropDownList(
        Obat::find()->select(['id', 'name'])->indexBy('id')->column(),
        ['prompt' => 'Pilih Obat']
    ) ?>

    <!-- <?= $form->field($model, 'quantity')->textInput() ?> -->

    <?= $form->field($model, 'total_cost')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>