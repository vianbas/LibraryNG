<?php
use yii\helpers\Html;
use yii\grid\GridView;
use kartik\date\DatePicker;


/* @var $this yii\web\View */
/* @var $searchModel backend\models\LoanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Loans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="loan-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
                <!--  <p><?= Html::a('Create New Loan', ['create'], ['class' => 'btn btn-success']) ?></p> -->                   
          <div class="row">
            <div class="col-xs-12">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#activity" data-toggle="tab">All Loans</a></li>
                            <li><a href="#timeline" data-toggle="tab">Request</a></li>
                            <li><a href="#settings" data-toggle="tab">Borrowing</a></li>
                            <li><a href="#settingss" data-toggle="tab">Due Date</a></li>
                        </ul>
                    <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <div class="post">
                      <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'rowOptions'=> function($model){
                if($model->due_date=='0000-00-00'){                    
                    return ['class'=>'danger'];
                    }
                },          
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    [
                            'attribute' => 'ID',
                            'format'=>'raw',
                            'value'=>function($model){                                 
                                return Html::a(''.$model->id.'',['view', 'id' => $model->id]);                                
                            }
                    ],
                    [
                            'attribute' => 'ID',
                            'format'=>'raw',
                            'value'=>function($model){
                                return Html::a(''.$model->copy->book->title.'',['view', 'id' => $model->id]);                                
                            }
                    ],        
                    [
                            'attribute' => 'Borrower',
                            'format'=>'raw',
                            'value'=>function($model){
                                return Html::a(''.$model->borrower->first_name.' '.$model->borrower->last_name.'',['view', 'id' => $model->id]);                                
                            }
                    ],
                    //'borrower.first_name',
                    [
                        'attribute' => 'Staff Name',
                        'format'=>'raw',
                        'value'=>'staff.first_name'
                    ],
                    'staff.first_name',
                    [
                      'attribute'=>'start_date',
                      'value'=>'start_date',
                      'format'=>'raw',
                      'filter'=>DatePicker::widget([
                                'model'=>$searchModel,
                                'name'=>'start_date',
                                'attribute'=>'start_date',
                                'pluginOptions' => [
                                    'format' => 'yyyy-mm-dd',
                                    'todayHighlight' => true
                                ]
                              ]),                         
                    ],        
         //           'start_date',
                    [
                      'attribute'=>'due_date',
                      'value'=>'due_date',
                      'format'=>'raw',
                      'filter'=>DatePicker::widget([
                                'model'=>$searchModel,
                                'name'=>'due_date',
                                'attribute'=>'due_date',
                                'pluginOptions' => [
                                    'format' => 'yyyy-mm-dd',
                                    'todayHighlight' => true
                                ]
                              ]),                         
                    ],
                    [
                      'attribute'=>'return_date',
                      'value'=>'return_date',
                      'format'=>'raw',
                      'filter'=>DatePicker::widget([
                                'model'=>$searchModel,
                                'name'=>'return_date',
                                'attribute'=>'return_date',
                                'pluginOptions' => [
                                    'format' => 'yyyy-mm-dd',
                                    'todayHighlight' => true
                                ]
                              ]),                         
                    ],
                    'fines',
                    [
                        'attribute' => 'Action',
                        'format'=>'raw',
                        'value'=>function($model){
                            if($model->return_date==NULL){
                                if($model->start_date=='0000-00-00' && $model->due_date!='0000-00-00'){
                                  return Html::a('<button class="btn btn-block btn-success btn-xs">Approve</button>',['approve', 'id' => $model->id,'copy_id'=>$model->copy_id]).Html::a('<button class="btn btn-block btn-danger btn-xs">Reject</button>',['reject', 'id' => $model->id]);                       
                                }
                                else if($model->due_date=='0000-00-00'){
                                    return 'rejected';
                                }
                                else{
                                  return Html::a('<button class="btn btn-block btn-success btn-xs">Return</button>',['return', 'id' => $model->id,'copy_id'=>$model->copy_id]); 
                                }
                            }
                            else{
                                  return ' ';
                            }
                        }
                   ],
                 
        ],
    ]); ?>

                    </div>
                    
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">
                    <!-- The timeline -->                   
                     <?= GridView::widget([
                    'dataProvider' => $belum_di_Approve,
                    //'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        'id',
                        'copy_id',
                        'borrower.first_name',
                        'staff_id',
                        'start_date',
                        'due_date',
                        'return_date',
                        'fines',
                        [
                            'attribute' => 'Action',
                            'format'=>'raw',
                            'value'=>function($model){
                                if($model->return_date==NULL){
                                    if($model->start_date=='0000-00-00'){
                                      return Html::a('<button class="btn btn-block btn-success btn-xs">Approve</button>',['approve', 'id' => $model->id,'copy_id'=>$model->copy_id]).Html::a('<button class="btn btn-block btn-danger btn-xs">Reject</button>',['reject', 'id' => $model->id]);                       
                                    }
                                else{
                                      return Html::a('<button class="btn btn-block btn-success btn-xs">Return</button>',['return', 'id' => $model->id,'copy_id'=>$model->copy_id]); 
                                    }
                                }
                                else{
                                      return ' ';
                                }
                            }
                       ],

                    ],
                ]); ?> 
                </div><!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                    <?= GridView::widget([
                        'dataProvider' => $belum_jatuh_tempo,
                        //'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            'id',
                            'copy_id',
                            'borrower.first_name',
                            'staff_id',
                            'start_date',
                            'due_date',
                            'return_date',
                            'fines',
                            [
                                'attribute' => 'Action',
                                'format'=>'raw',
                                'value'=>function($model){
                                    if($model->return_date==NULL){
                                        if($model->start_date=='0000-00-00'){
                                          return Html::a('<button class="btn btn-block btn-success btn-xs">Approve</button>',['approve', 'id' => $model->id,'copy_id'=>$model->copy_id]).Html::a('<button class="btn btn-block btn-danger btn-xs">Reject</button>',['reject', 'id' => $model->id]);                       
                                        }
                                    else{
                                          return Html::a('<button class="btn btn-block btn-success btn-xs">Return</button>',['return', 'id' => $model->id,'copy_id'=>$model->copy_id]); 
                                        }
                                    }
                                    else{
                                          return ' ';
                                    }
                                }
                           ],
                        ],
                    ]); ?>
                                </div>
                <div class="tab-pane" id="settingss">
                    <?= GridView::widget([
                        'dataProvider' => $sudah_jatuh_tempo,
                        //'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            'id',
                            'copy_id',
                            'borrower.first_name',
                            'staff_id',
                            'start_date',
                            'due_date',
                            'return_date',
                            [
                                'attribute'=>'fines',
                                'format'=>'raw',
                                'value'=> function($model){
                                    return \common\models\Loan::getCount($model->id);
                                }                                
                            ],
                            [
                                'attribute' => 'Action',
                                'format'=>'raw',
                                'value'=>function($model){
                                    if($model->return_date==NULL){
                                        if($model->start_date=='0000-00-00'){
                                          return Html::a('<button class="btn btn-block btn-success btn-xs">Approve</button>',['approve', 'id' => $model->id,'copy_id'=>$model->copy_id]).Html::a('<button class="btn btn-block btn-danger btn-xs">Reject</button>',['reject', 'id' => $model->id]);                       
                                        }
                                    else{
                                          return Html::a('<button class="btn btn-block btn-success btn-xs">Return</button>',['return', 'id' => $model->id,'copy_id'=>$model->copy_id]); 
                                        }
                                    }
                                    else{
                                          return ' ';
                                    }
                                }
                           ],
                        ],
                    ]); ?>
                                </div>
                  <!-- /.tab-pane -->
                            </div><!-- /.tab-content -->
                        </div><!-- /.nav-tabs-custom -->              
                    </div>
                
        </div>
    </div>


