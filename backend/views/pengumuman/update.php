<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Pengumuman */

$this->title = 'Update Pengumuman: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Pengumumen', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_pengumuman, 'url' => ['view', 'id' => $model->id_pengumuman]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pengumuman-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
