<?php

use app\models\Tagihan;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\TagihanSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Tagihan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tagihan-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Tambah Tagihan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'pasien_id',
                'value' => function ($model) {
                    return isset($model->pasien) ? $model->pasien->nama : 'Nama Pasien Tidak Tersedia';
                },
                'label' => 'Nama Pasien',
            ],
            [
                'attribute' => 'tindakan_id',
                'value' => function ($model) {
                    return isset($model->tindakan) ? $model->tindakan->nama : 'Nama Tindakan Tidak Tersedia';
                },
                'label' => 'Nama Tindakan',
            ],
            [
                'attribute' => 'obat_id',
                'value' => function ($model) {
                    return isset($model->obat) ? $model->obat->nama : 'Nama Obat Tidak Tersedia';
                },
                'label' => 'Nama Obat',
            ],
            'jumlah',
            //'created_at',
            //'updated_at',
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, Tagihan $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],

    ]); ?>


</div>