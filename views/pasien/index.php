<?php

use app\models\Pasien;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\PasienSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Pasien';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pasien-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Tambah Pasien', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'nama',
            'tanggal_lahir',
            'jenis_kelamin',
            'alamat:ntext',
            [
                'attribute' => 'wilayah_id',
                'value' => function ($model) {
                    return $model->wilayah->nama;
                },
                'label' => 'Wilayah',
            ],
            //'created_at',
            //'updated_at',
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, Pasien $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>


</div>