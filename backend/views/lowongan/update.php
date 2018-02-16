<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Lowongan */

$this->title = 'Update Lowongan: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Lowongans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_lowongan, 'url' => ['view', 'id' => $model->id_lowongan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="lowongan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
