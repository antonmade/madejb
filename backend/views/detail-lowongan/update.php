<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\DetailLowongan */

$this->title = 'Update Detail Lowongan: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Detail Lowongans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id, 'id_lowongan' => $model->id_lowongan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="detail-lowongan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
