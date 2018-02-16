<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\StatistikSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="statistik-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_statistik') ?>

    <?= $form->field($model, 'id_admin') ?>

    <?= $form->field($model, 'access_time') ?>

    <?= $form->field($model, 'user_ip') ?>

    <?= $form->field($model, 'user_host') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
