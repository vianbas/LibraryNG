<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use common\widgets\Alert;

/* @var $this yii\web\View */
/* @var $model backend\models\Book */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Books', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-view">
<?= Alert::widget()?>    
<section class="content">
          <div class="row">
            <div class="col-md-12">
             <div class="box box-solid box-info">
                <!-- /.box-header -->
                <div class="box-body">
                <div class="col-md-2">                                       
                   <?= Html::img(Yii::$app->urlManagerBackend->baseUrl.'/'.$model->photo,['width'=>150,'height'=>230]); ?>
                   <?php //die(Yii::$app->basePath); ?>
                </div>
                <div class="col-md-10">
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'title',
                        [
                            'label'=>'author',
                            'value'=>$author->first_name.' '.$author->last_name
                        ],
                        'publisher.name',
                        'isbn',                        
                        'year',
                        'description',
                    ],
                ])?>                    
                </div>
                </div>
             </div>
            </div>
          </div>
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
                                            [
                                        'attribute' => ' ',
                                        'format'=>'raw',
                                        'value'=>function($model){
                                        return Html::a('<button class="btn btn-success btn-xs">view</button>',['viewbookcopy', 'id' => $model->id]);                                
                                      }
                                    ],
                                ],
                            ]
                            )?>                     
                        </div>
                    </div>
                </div>
        </div>
</section>
    
                   
                      
</div>
