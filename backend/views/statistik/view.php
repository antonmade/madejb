<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Statistik */

$this->title = $model->id_statistik;
$this->params['breadcrumbs'][] = ['label' => 'Statistiks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="statistik-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_statistik], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_statistik], [
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
            'id_statistik',
            'id_admin',
            'access_time',
            'user_ip',
            'user_host',
        ],
    ]) ?>

</div>
