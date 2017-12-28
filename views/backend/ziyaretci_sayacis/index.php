<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel kouosl\ziyaretci_sayaci\models\IpSayacisSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ip Sayacis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ip-sayaci-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Ip Sayaci', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'simdi',
            'sayac',
            'ip',
            'gun',
            // 'ay',
            // 'yil',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
