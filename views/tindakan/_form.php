<?php

use app\models\Obat;
use yii\helpers\Html;
use app\models\Pasien;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var app\models\Tindakan $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="tindakan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pasien_id')->dropDownList(
        ArrayHelper::map(Pasien::find()->all(), 'id', 'nama'),
        ['prompt' => '..Pilih Nama..']
    )->label('Nama Pasien') ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true])->label('Tindakan') ?>

    <?= $form->field($model, 'obat_id')->dropDownList(
        ArrayHelper::map(Obat::find()->all(), 'id', 'nama'),
        ['prompt' => '..Pilih Obat..']
    )->label('Nama Obat') ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>