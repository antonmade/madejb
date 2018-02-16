<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\StatistikSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Statistiks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="statistik-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Statistik', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_statistik',
            'id_admin',
            'access_time',
            'user_ip',
            'user_host',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
