<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\DetailNilai */

$this->title = 'Update Detail Nilai: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Detail Nilais', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id, 'id_penilaian' => $model->id_penilaian]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="detail-nilai-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
