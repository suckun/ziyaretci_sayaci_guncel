<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model kouosl\ziyaretci_sayaci\models\IpSayacisSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ip-sayaci-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'simdi') ?>

    <?= $form->field($model, 'sayac') ?>

    <?= $form->field($model, 'ip') ?>

    <?= $form->field($model, 'gun') ?>

    <?php // echo $form->field($model, 'ay') ?>

    <?php // echo $form->field($model, 'yil') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
