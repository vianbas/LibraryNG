<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AuthAssignmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Role Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-assignment-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Role User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
                    <div class="row">
                    <div class="col-md-12">
        
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],


            'member.first_name',
            'item_name',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div></div></div>
