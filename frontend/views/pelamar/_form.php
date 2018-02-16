<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model frontend\models\Pelamar */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pelamar-form col-sm-7">

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

<?= $form->field($model, 'nik')->textInput(['maxlength' => true, 'placeholder' => "Masukkan NIK KTP Anda"])?>

<?= $form->field($model, 'nama_lengkap')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'alamat_ktp')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'provinsi')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'kota')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'status_menikah')->dropdownList([
    1 => 'Belum menikah', 
    2 => 'Sudah menikah'
],
['prompt'=>'--Pilih kategori--']
)?>

<?= $form->field($model, 'deskripsi_keahlian')->textArea(['maxlength' => true]) ?>

<?= $form->field($model, 'pengalaman_kerja')->textArea(['maxlength' => true]) ?>

<?= $form->field($model, 'imageFile')->fileInput()->label('Foto') ?>

<?= $form->field($model, 'jenjang')->dropdownList([
    'D3' => 'D3', 
    'D4' => 'D4',
    'S1' => 'S1',
    'S2' => 'S2',
    'Lainnya' => 'Lainnya', 
],
['prompt'=>'--Pilih kategori--']
)?>

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
