<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\Pengumuman */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pengumuman-form">

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ; ?>

    <?= $form->field($model, 'id_admin')->textInput() ?>

    <?= $form->field($model, 'nama_pengumuman')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tanggal_pengumuman')->widget(
        DatePicker::className(),
        ['clientOptions' => ['defaultDate' => '2018-01-01'],
        'dateFormat' => 'yyyy-MM-dd' ,
        'options'=>['style'=>'width:250px;', 'class'=>'form-control']]) ?>

    <?= $form->field($model, 'pdfFile')->fileInput()->label('File Pengumuman') ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
