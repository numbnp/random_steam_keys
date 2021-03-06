<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use \backend\models\Groups;

/* @var $this yii\web\View */
/* @var $model backend\models\Games */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="games-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
        $groups = Groups::find()->all();
        $items = ArrayHelper::map($groups,'id','name');
        $params = [
            'prompt' => 'Укажите группу'
        ];
    ?>
    <?= $form->field($model, 'group_id')->dropDownList($items,$params) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cost')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
