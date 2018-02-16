<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Statistik */

$this->title = 'Create Statistik';
$this->params['breadcrumbs'][] = ['label' => 'Statistiks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="statistik-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
