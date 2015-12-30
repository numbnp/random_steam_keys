<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
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
            'prompt' => 'Укажите автора записи'
        ];
    ?>
    <?= $form->field($model, 'group_id')->dropDownList($items,$params) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cost')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
