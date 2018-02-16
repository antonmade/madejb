<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Pengumuman */


$this->title = $model->id_pengumuman;
$this->params['breadcrumbs'][] = ['label' => 'Pengumumen', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pengumuman-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_pengumuman], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_pengumuman], [
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
            'id_pengumuman',
            'id_admin',
            'nama_pengumuman',
            'tanggal_pengumuman',
            'file_pengumuman',
            
                /* 'value' => \Yii::$app->response->sendFile
                (\Yii::$app->request->BaseUrl.'/'.$model->file_pengumuman)->send(), */
                
            
            //'file_pengumuman',
        ],
    ]) ?>

</div>
