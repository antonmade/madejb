<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Pelamar */

$this->title = 'Update Profil:';
$this->params['breadcrumbs'][] = ['label' => 'Pelamars', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pelamar-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
