<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = "Loan Detail ";
$this->params['breadcrumbs'][] = ['label' => 'Loans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="loan-view">    
        <div class="row">
            <div class="col-xs-12">

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
                <center>
                    <?= Html::a('return', ['return',['return', 'id' => $model->id,'copy_id'=>$model->copy_id]], [
                        'class' => 'btn btn-success',
                        'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                        ],
                    ]) ?>
                </center>
            </div>
</div>