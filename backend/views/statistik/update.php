<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Statistik */

$this->title = 'Update Statistik: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Statistiks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_statistik, 'url' => ['view', 'id' => $model->id_statistik]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="statistik-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
