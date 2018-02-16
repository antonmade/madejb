<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\DetailNilai */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Detail Nilais', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detail-nilai-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id, 'id_penilaian' => $model->id_penilaian], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id, 'id_penilaian' => $model->id_penilaian], [
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
            'id_penilaian',
            'nilai',
            'tanggal_penilaian',
            'pemberi_nilai',
        ],
    ]) ?>

</div>
