<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\DetailLowongan */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Detail Lowongans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detail-lowongan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id, 'id_lowongan' => $model->id_lowongan], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id, 'id_lowongan' => $model->id_lowongan], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'id_lowongan',
        ],
    ]) ?>

</div>
