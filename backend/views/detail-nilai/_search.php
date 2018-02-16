<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\DetailNilaiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="detail-nilai-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_penilaian') ?>

    <?= $form->field($model, 'nilai') ?>

    <?= $form->field($model, 'tanggal_penilaian') ?>

    <?= $form->field($model, 'pemberi_nilai') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
