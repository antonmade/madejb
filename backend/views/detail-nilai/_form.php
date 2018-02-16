<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\DetailNilai */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="detail-nilai-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'id_penilaian')->textInput() ?>

    <?= $form->field($model, 'nilai')->textInput() ?>

    <?= $form->field($model, 'tanggal_penilaian')->widget(
        DatePicker::className(),
        ['clientOptions' => ['defaultDate' => '1990-01-01'],
        'dateFormat' => 'yyyy-MM-dd' ,
        'options'=>['style'=>'width:250px;', 'class'=>'form-control']])
    ?>

    <?= $form->field($model, 'pemberi_nilai')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
