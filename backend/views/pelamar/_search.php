<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PelamarSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pelamar-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'username') ?>

    <?= $form->field($model, 'auth_key') ?>

    <?= $form->field($model, 'password_hash') ?>

    <?= $form->field($model, 'password_reset_token') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'nik') ?>

    <?php // echo $form->field($model, 'nama_lengkap') ?>

    <?php // echo $form->field($model, 'alamat_ktp') ?>

    <?php // echo $form->field($model, 'provinsi') ?>

    <?php // echo $form->field($model, 'kota') ?>

    <?php // echo $form->field($model, 'status_menikah') ?>

    <?php // echo $form->field($model, 'deskripsi_keahlian') ?>

    <?php // echo $form->field($model, 'pengalaman_kerja') ?>

    <?php // echo $form->field($model, 'foto') ?>

    <?php // echo $form->field($model, 'jenjang') ?>

    <?php // echo $form->field($model, 'jurusan') ?>

    <?php // echo $form->field($model, 'ipk') ?>

    <?php // echo $form->field($model, 'nama_institusi') ?>

    <?php // echo $form->field($model, 'no_ijazah') ?>

    <?php // echo $form->field($model, 'toefl') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
