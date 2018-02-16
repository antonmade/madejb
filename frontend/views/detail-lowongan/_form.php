<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\DetailLowongan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="detail-lowongan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= //$form->field($model, 'id')->textInput()
    $form->field($model, 'id')->hiddenInput()->label(false) 
    ?>

    <?= //$form->field($model, 'id_lowongan')->textInput()
     $form->field($model, 'id_lowongan')
    ->dropdownList($lowongan,
    ['prompt'=>'--Pilih Lowongan--'])
    ->label('Nama Lowongan')  
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
