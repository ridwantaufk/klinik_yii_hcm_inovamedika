<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Tagihan $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tagihan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tagihan-view">

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
            // 'id',
            [
                'attribute' => 'pasien_id',
                'value' => function ($model) {
                    return $model->pasien->nama;
                },
                'label' => 'Nama Pasien'
            ],
            [
                'attribute' => 'tindakan_id',
                'value' => function ($model) {
                    return $model->tindakan->nama;
                },
                'label' => 'Tindakan'
            ],
            [
                'attribute' => 'obat_id',
                'value' => function ($model) {
                    return $model->obat->nama;
                },
                'label' => 'Obat'
            ],
            'jumlah',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>