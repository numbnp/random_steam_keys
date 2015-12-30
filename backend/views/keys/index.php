<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SearchKeys */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Keys';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="keys-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Keys', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'gamename',
            'key',
            'cost',
            //'created_at',
            // 'updated_at',
             'sales',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
