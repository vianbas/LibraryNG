<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\BookCopy */

$this->title = "Book Copy ".$model->book->title;
$this->params['breadcrumbs'][] = ['label' => 'Books', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->book->title, 'url' => ['view','id'=>$model->book->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-copy-view">
    <div class="row">
            <div class="col-md-12">
             <div class="box">
                <div class="  box-header with-border">
                 <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                <div class="col-md-2">
                    <?= Html::img(Yii::$app->urlManagerBackend->baseUrl.'/'.$model->book->photo,['width'=>150,'height'=>230]); ?>
                    <?php //die(Yii::$app->basePath); ?>
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
               <center> <?= Html::a('Borrow',['borrow', 'id' => $model->id,'book_id'=>$model->book_id], ['class' => 'btn btn-primary btn-success ']) ?>
               </center> </div>                
             </div>
            </div>
    </div>
</div>
