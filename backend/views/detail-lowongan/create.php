<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\DetailLowongan */

$this->title = 'Create Detail Lowongan';
$this->params['breadcrumbs'][] = ['label' => 'Detail Lowongans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detail-lowongan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
