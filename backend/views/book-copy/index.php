<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\BookCopySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Book Copies';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-copy-index">
        <p><?= Html::a('Create Book', ['create'], ['class' => 'btn btn-success']) ?></p>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
                    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
//            'id',
            [
                'attribute'=>'book',
                'value'=>'book.title'
            ],
            'call_number',
            'year',
//            'availability',
            [
                'attribute'=>'action',
                'format'=>'raw',
                'value'=> function($model){
                    return Html::a('<button class="btn btn-block btn-success btn-xs">view</button>',['/book/viewbookcopy', 'id' => $model->id]);
                }
            ],                
//            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
