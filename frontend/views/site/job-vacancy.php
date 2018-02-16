<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\BaseYii;

$this->title = 'Job Vacancy';
$this->params['breadcrumbs'][] = $this->title;
?>
<!--mengubah ke jobvacancy-->
<div class="site-jobvacancy">
<h1>Active Vacancies</h1>
<h4>
<ol>
<?php foreach ($lowongans as $lowongan): ?>
    <li>
    <?php
    Modal::begin([
    'size' => 'modal-lg',
    'header' => '<h2>Kriteria</h2>',
    'toggleButton' => [
        'label' => $lowongan->nama_lowongan,
        'tag' => 'a href',
    ],
]);
echo nl2br($lowongan->kriteria);
Modal::end(); 
?>
    </li>
<?php endforeach; ?>
</ol>
</h4>
</div>
