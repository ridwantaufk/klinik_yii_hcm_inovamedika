<?php

use yii\helpers\Html;
use app\models\Pasien;
use app\models\Tindakan;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Obat;

/** @var yii\web\View $this */
/** @var app\models\Tagihan $model */
/** @var yii\widgets\ActiveForm $form */

$tindakanList = ArrayHelper::map(Tindakan::find()->all(), 'id', 'nama');

?>

<div class="tagihan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pasien_id')->dropDownList(
        ArrayHelper::map(Pasien::find()->all(), 'id', 'nama'),
        ['prompt' => 'Pilih Pasien']
    ) ?>

    <?= $form->field($model, 'tindakan_id')->dropDownList(
        ArrayHelper::map(Tindakan::find()->all(), 'id', 'nama'),
        ['prompt' => 'Pilih Tindakan']
    ) ?>

    <?= $form->field($model, 'obat_id')->dropDownList(
        ArrayHelper::map(Obat::find()->all(), 'id', 'nama'),
        ['prompt' => 'Pilih Obat']
    ) ?>

    <?= $form->field($model, 'jumlah')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>