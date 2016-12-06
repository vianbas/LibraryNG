<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = "Loan Detail ".$model->id;
$this->params['breadcrumbs'][] = ['label' => 'Loans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="loan-view">    
        <div class="row">
            <div class="col-xs-12">
                <div class="box">                
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'id',
                            'copy_id',
                            [
                              'attribute' =>'borrower',
                              'format'=>'raw', 
                              'value'=> Html::a(''.$model->borrower->first_name.' '.$model->borrower->last_name.'',['member/view', 'id' => $model->borrower->id]),    
                            ],
                            'staff.id',    
                            'start_date',
                            'due_date',
                            'return_date',
                            'fines',
                        ],
                    ]) ?>
                </div>
            </div>
        </div>
</div>