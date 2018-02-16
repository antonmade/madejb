<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Pelamar */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pelamars', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pelamar-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'username',
            'auth_key',
            'password_hash',
            'password_reset_token',
            'email:email',
            'status',
            'nik',
            'nama_lengkap',
            'alamat_ktp',
            'provinsi',
            'kota',
            'status_menikah',
            'deskripsi_keahlian',
            'pengalaman_kerja',
            'foto',
            'jenjang',
            'jurusan',
            'ipk',
            'nama_institusi',
            'no_ijazah',
            'toefl',
        ],
    ]) ?>

</div>
