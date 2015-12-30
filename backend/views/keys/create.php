<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Keys */

$this->title = 'Create Keys';
$this->params['breadcrumbs'][] = ['label' => 'Keys', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="keys-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
