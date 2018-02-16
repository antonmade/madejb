<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\LowonganSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lowongan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_lowongan') ?>

    <?= $form->field($model, 'id_admin') ?>

    <?= $form->field($model, 'nama_lowongan') ?>

    <?= $form->field($model, 'status_lowongan') ?>

    <?= $form->field($model, 'kriteria') ?>

    <?php // echo $form->field($model, 'tanggal_lowongan') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
