<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model kouosl\ziyaretci_sayaci\models\IpSayaci */

$this->title = 'Create Ip Sayaci';
$this->params['breadcrumbs'][] = ['label' => 'Ip Sayacis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ip-sayaci-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
