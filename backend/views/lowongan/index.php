<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\LowonganSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lowongans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lowongan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Lowongan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'options' => [
            'style'=>'overflow: auto; word-wrap: break-word;'
    ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_lowongan',
            'id_admin',
            'nama_lowongan',
            'status_lowongan',
            'kriteria',
            //'tanggal_lowongan',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
