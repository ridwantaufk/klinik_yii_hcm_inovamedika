<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Obat $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Obat', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="obat-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Perbarui', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Yakin ingin dihapus ?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nama',
            'deskripsi',
            'harga',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>