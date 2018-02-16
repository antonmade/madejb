<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Penilaian */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="penilaian-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_admin')->textInput() ?>

    <?= $form->field($model, 'nama_penilaian')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
