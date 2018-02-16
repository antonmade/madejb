<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\BaseFileHelper;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PengumumanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pengumuman';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pengumuman-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Pengumuman', ['create'], ['class' => 'btn btn-success']); ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_pengumuman',
            'id_admin',
            'nama_pengumuman',
            'tanggal_pengumuman',
            /* [
                'label' => 'File Pengumuman',
                'format' => 'raw',
                'value' => Html::a('Link',
                Url::to(\Yii::$app->request->BaseUrl.'/'.$model->file_pengumuman)),
            ], */
            'file_pengumuman',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
