<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Statistik */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="statistik-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_admin')->textInput() ?>

    <?= $form->field($model, 'access_time')->textInput() ?>

    <?= $form->field($model, 'user_ip')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_host')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
