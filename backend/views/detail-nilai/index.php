<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\DetailNilaiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Detail Nilais';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detail-nilai-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Detail Nilai', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_penilaian',
            'nilai',
            'tanggal_penilaian',
            'pemberi_nilai',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
