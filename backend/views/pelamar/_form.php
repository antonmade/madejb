<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Pelamar */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pelamar-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'auth_key')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password_hash')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password_reset_token')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'nik')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_lengkap')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat_ktp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'provinsi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kota')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status_menikah')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'deskripsi_keahlian')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pengalaman_kerja')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'foto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jenjang')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jurusan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ipk')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_institusi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_ijazah')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'toefl')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
