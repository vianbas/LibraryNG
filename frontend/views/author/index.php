<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\AuthorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Authors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="author-index">

   
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
     
    <section class="content">
          <div class="row">
            <div class="col-md-12">
             <?php  //echo $this->render('_search', ['model' => $searchModel]); ?>
                <div class="box-header with-border">
                </div><!-- /.box-header -->
                <div class="box-body">       
                            <?= GridView::widget([
                                'dataProvider' => $dataProvider,
                                'filterModel' => $searchModel,
                                'columns' => [
                                    ['class' => 'yii\grid\SerialColumn'],

                                    'id',
                                    'first_name',
                                    'last_name',
                                    'email:email',
                                    [
                                        'attribute'=>'action',
                                        'format'=>'raw',
                                        'value'=> function($model){
                                                   return Html::a('<button class="btn btn-block btn-success btn-xs">view</button>',['view', 'id' => $model->id]);
                                        }
                                    ]    
                        //            ['class' => 'yii\grid\ActionColumn'],
                                ],
                            ]); ?>
                        </div>
                 </div>
            
        </div>
</section>

</div>
