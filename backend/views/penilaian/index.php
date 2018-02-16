<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PenilaianSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Penilaians';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="penilaian-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Penilaian', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_penilaian',
            'id_admin',
            'nama_penilaian',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
