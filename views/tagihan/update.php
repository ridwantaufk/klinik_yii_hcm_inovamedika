<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Tagihan $model */

$this->title = 'Perbarui Tagihan: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tagihan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Perbarui';
?>
<div class="tagihan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>