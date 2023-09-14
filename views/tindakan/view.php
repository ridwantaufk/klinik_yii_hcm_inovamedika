<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Tindakan $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tindakan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tindakan-view">

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
            [
                'attribute' => 'pasien_id',
                'value' => function ($model) {
                    return $model->pasien->nama; // Mengambil nama wilayah dari relasi wilayah
                },
                'label' => 'Nama Pasien'
            ],
            [
                'attribute' => 'nama',
                'label' => 'Tindakan'
            ],
            [
                'attribute' => 'obat_id',
                'value' => function ($model) {
                    return isset($model->obat) ? $model->obat->nama : '-';
                },
                'label' => 'Nama Obat'
            ],
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>