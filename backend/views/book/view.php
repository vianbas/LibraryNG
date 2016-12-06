<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\Book */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Books', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-view">
    
<section class="content">
        <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Create Book Copy', ['book-copy/create'], ['class' => 'btn btn-success']) ?>
    </p>
          <div class="row">
            <div class="col-md-12">
             
                <div class="  box-header with-border">                
                </div><!-- /.box-header -->
                <div class="box-body">
                <div class="col-md-2">
                    <?= Html::img(''.\Yii::$app->request->BaseUrl.'/'.$model->photo.'',['width'=>130,'height'=>180]); ?>
                    <?php //die(Yii::$app->basePath); ?>
                </div>
                <div class="col-md-10">
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'title',
                        [
                           'attribute'=> 'Author',
                           'fromat'=>'raw',
                           'value'=> $model->author->first_name.' '.$model->author->last_name,
                        ],
                        'publisher.name',
                        'isbn',                        
                        'year',
                        'description',
                    ],
                ])?>                    
                </div></div></div></div></div>
                <div class="row">
                    <div class="col-md-12">
                      <div class="box">
                        <div class="box-header with-border">
                          <h3 class="box-title">Book Copy <?= Html::encode($this->title) ?></h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">                  
                            <?=  GridView::widget(
                            [
                                'dataProvider'=> $dataProvider,
                                'rowOptions'=> function($model){
                                        if($model->availability>=1){                    
                                            return ['class'=>'success'];
                                        }
                                        else {
                                            return ['class'=>'danger'];
                                        }
                                },

                                'columns'=>[
                                    ['class'=> 'yii\grid\SerialColumn'],                
                                    'id',
                                    'call_number',
                                    'year',
                                    [
                                        'attribute' => 'view',
                                        'format'=>'raw',
                                        'value'=>function($model){
                                        return Html::a('<button class="btn btn-block btn-success btn-xs">view</button>',['viewbookcopy', 'id' => $model->id]);                                
                                      }
                                    ],   
                                     [
                                    'attribute' => 'Action',
                                    'format'=>'raw',    
                                    'value'=>
                                        function($model){
                                            if($model->availability=='1'){  
                                                    return Html::a('<button class="btn btn-block btn-success btn-xs">Borrow</button>',['borrow', 'id' => $model->id,'book_id'=>$model->book_id]);
                                            }
                                            else{
                                                  return ' ';
                                            }
                                        }
                                    ],
                                                    
                                ]
                            ]
                            )?>                     
                        </div>
                    </div>
                </div>
        
</section>
    
                   
                      
</div>
