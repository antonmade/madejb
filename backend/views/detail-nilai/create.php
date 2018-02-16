<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\DetailNilai */

$this->title = 'Create Detail Nilai';
$this->params['breadcrumbs'][] = ['label' => 'Detail Nilais', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detail-nilai-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
