<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\DetailLowonganSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lowongan yang dipilih';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detail-lowongan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Pilih Lowongan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?=
     GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_lowongan',

            [
                'class' => 'yii\grid\ActionColumn',
                'visibleButtons' => [
                    'update' => Yii::$app->user->can('update'),
                    'delete' => Yii::$app->user->can('delete')
                ]
            ],
        ],
    ]);?>
</div>
