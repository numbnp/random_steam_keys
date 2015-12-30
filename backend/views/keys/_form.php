<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use \backend\models\Games;

/* @var $this yii\web\View */
/* @var $model backend\models\Keys */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="keys-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
        $games = Games::find()->all();
        $items = ArrayHelper::map($games,'id','name');
        $params = [
            'prompt' => 'Укажите продукт'
        ];
    ?>

    <?= $form->field($model, 'game_id')->dropDownList($items,$params) ?>

    <?= $form->field($model, 'key')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cost')->textInput() ?>

    <?= $form->field($model, 'sales')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
