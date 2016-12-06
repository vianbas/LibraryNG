<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\LoanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Loans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="loan-index">
    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>    
    <section class="content">
          <div class="row">
            <div class="col-md-12">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,       
//        'filterModel' => $searchModel,
        'rowOptions'=> function($model){
            if($model->due_date=='0000-00-00'){                    
               return ['class'=>'danger'];
            }
            if(\common\models\Loan::getCount($model->id)>0 && $model->return_date==NULL){
                return ['class'=>'warning'];
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
                            'attribute' => 'Book Title',
                            'format'=>'raw',
                            'value'=>function($model){
                                return Html::a(''.$model->copy->book->title.'',['view', 'id' => $model->id]);                                
                            }
                    ],      
            'start_date',
            'due_date',
            'return_date',
            [
                'attribute'=>'fines',
                'format'=>'raw',
                'value'=>function($model){
                       return \common\models\Loan::getCount($model->id);
                }
            ],
            [
                'attribute' => 'Status',
                'format'=>'raw',                
                'value'=>function($model){
                    if($model->start_date=='0000-00-00' && $model->due_date!='0000-00-00' ){                            
                          return Html::a('<button class="btn btn-block btn-danger btn-xs">cancel</button>',['cancel', 'id' => $model->id]);                                                   
                    }
                    else if($model->return_date!=null){
                      return 'Returned';  
                    }
                    else if ($model->due_date=='0000-00-00'){
                       return 'Rejected';
                    }
                    else{
                        if(\common\models\Loan::getCount($model->id)>0){
                            return Html::a('<button class="fa fa-warning"> warning </button>');
                        }
                        else{                           
                          return ' ';
                        }
                    }
//                    if(\common\models\Loan::getCount($model->id)>0){
//                        return 'aa';
//                    }
//                    ['label' => 'My Loan', 'icon' => 'fa fa-users', 'url' => ['/loan']],
                }
            ],
        ],
    ]); ?>
           </div>
                 </div>

        
</section>         
</div>
