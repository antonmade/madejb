<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Lowongan */

$this->title = $model->id_lowongan;
$this->params['breadcrumbs'][] = ['label' => 'Lowongans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lowongan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_lowongan], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_lowongan], [
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
            'id_lowongan',
            'id_admin',
            'nama_lowongan',
            'status_lowongan',
            'kriteria',
            'tanggal_lowongan',
        ],
    ]) ?>

</div>
