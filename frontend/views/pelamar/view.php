<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Pelamar */

$this->title = $model->nama_lengkap;
$this->params['breadcrumbs'][] = ['label' => 'Pelamar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pelamar-view">

    <p>
    <?= Html::img(\Yii::$app->request->BaseUrl.'/'.$model->foto,['width' => '60px']); ?>
    </p>
    <p>
    <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            //'username',
            //'auth_key',
            //'password_hash',
            //'password_reset_token',
            //'email:email',
            //'status',
            'nik',
            'nama_lengkap',
            'alamat_ktp',
            'provinsi',
            'kota',
            'status_menikah',
            'deskripsi_keahlian',
            'pengalaman_kerja',
            //'foto',
            'jenjang',
            'jurusan',
            'ipk',
            'nama_institusi',
            'no_ijazah',
            'toefl',
        ],
    ]) ?>
</div>
