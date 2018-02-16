<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Lowongan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lowongan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_admin')->textInput() ?>

    <?= $form->field($model, 'nama_lowongan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status_lowongan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kriteria')->textArea(['maxlength' => true]) ?>

    <?= $form->field($model, 'tanggal_lowongan')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
