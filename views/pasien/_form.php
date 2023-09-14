<?php

use yii\helpers\Html;
use app\models\Wilayah;
use kartik\date\DatePicker;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var app\models\Pasien $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pasien-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tanggal_lahir')->widget(DatePicker::class, [
        'options' => ['placeholder' => 'Enter birth date ...'],
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd'
        ]
    ]) ?>


    <?= $form->field($model, 'jenis_kelamin')->dropDownList(['Laki-laki' => 'Laki-laki', 'Perempuan' => 'Perempuan',], ['prompt' => '']) ?>

    <?= $form->field($model, 'alamat')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'wilayah_id')->dropDownList(
        ArrayHelper::map(Wilayah::find()->all(), 'id', 'nama'),
        ['prompt' => 'Pilih Wilayah']
    )->label('Wilayah') ?>


    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>