<?php

use app\models\Tindakan;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\TindakanSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Tindakan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tindakan-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Tambah Tindakan', ['create'], ['class' => 'btn btn-success']) ?>
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
                    return $model->pasien->nama;
                },
                'label' => 'Nama Pasien',
            ],
            [
                'attribute' => 'nama',
                'label' => 'Tindakan'
            ],
            [
                'attribute' => 'obat_id',
                'format' => 'raw',
                'value' => function ($model) {
                    return isset($model->obat) ? $model->obat->nama : '<b>Tanpa Obat</b>';
                },
                'label' => 'Nama Obat'
            ],

            'created_at',
            'updated_at',
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, Tindakan $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>


</div>