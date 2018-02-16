<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PelamarSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pelamars';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pelamar-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Pelamar', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
            'auth_key',
            'password_hash',
            'password_reset_token',
            //'email:email',
            //'status',
            //'nik',
            //'nama_lengkap',
            //'alamat_ktp',
            //'provinsi',
            //'kota',
            //'status_menikah',
            //'deskripsi_keahlian',
            //'pengalaman_kerja',
            //'foto',
            //'jenjang',
            //'jurusan',
            //'ipk',
            //'nama_institusi',
            //'no_ijazah',
            //'toefl',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
