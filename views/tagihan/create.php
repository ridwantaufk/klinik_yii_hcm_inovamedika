<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Tagihan $model */

$this->title = 'Tambah Tagihan';
$this->params['breadcrumbs'][] = ['label' => 'Tagihan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tagihan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>