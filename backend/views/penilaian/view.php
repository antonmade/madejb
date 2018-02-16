<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Penilaian */

$this->title = $model->id_penilaian;
$this->params['breadcrumbs'][] = ['label' => 'Penilaians', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="penilaian-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_penilaian], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_penilaian], [
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
            'id_penilaian',
            'id_admin',
            'nama_penilaian',
        ],
    ]) ?>

</div>
