<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\DetailLowongan */

$this->title = $lowongan->nama_lowongan;
//$this->lowongan = $lowongan->nama_lowongan;
//$this->params['breadcrumbs'][] = ['label' => 'Detail Lowongans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detail-lowongan-view col-sm-4">

    <h1><?= Html::encode($this->title) ?></h1>

</div>
