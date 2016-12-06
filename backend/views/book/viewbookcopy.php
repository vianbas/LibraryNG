<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\BookCopy */

$this->title = "Book Copy";
$this->params['breadcrumbs'][] = ['label' => 'Books', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->book->title, 'url' => ['view','id'=>$model->book->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-copy-view">
    <div class="row">
            <div class="col-md-12">
                <div class="box-header with-border">            
                </div><!-- /.box-header -->
                <div class="box-body">
                <div class="col-md-2">
                    <?= Html::img(''.\Yii::$app->request->BaseUrl.'/'.$model->book->photo.'',['width'=>145,'height'=>215]); ?>            
                </div>
                <div class="col-md-10">
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'id',
                        'book_id',
                        'call_number',
                        'year',
                        'availability',
                        'loanable',                           
                    ],
                    
                ]) ?>                    
                </div>
               <center> <?= Html::a('Update', ['book-copy/update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['book-copy/delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>  <?= Html::a('Borrow', ['borrow', 'id' => $model->id,'book_id'=>$model->book_id], ['class' => 'btn btn-primary btn-success ']) ?>
               </center> </div>
                

            </div>
    </div>

</div>
