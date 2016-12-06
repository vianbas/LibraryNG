<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $model common\models\Author */

$this->title = $model->first_name." ".$model->last_name;
$this->params['breadcrumbs'][] = ['label' => 'Authors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="author-view">
    <section class="content">
          <div class="row">
            <div class="col-md-12">
             <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
                </div><!-- /.box-header -->
                <div class="box-body">                 
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'id',
                        'first_name',
                        'last_name',
                        'email:email',
                    ],
                ])?>
               </div></div></div></div>
               <div class="row">
                    <div class="col-md-12">
                      <div class="box">
                        <div class="box-header with-border">
                          <h3 class="box-title">Books of <?= Html::encode($this->title) ?></h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                        <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'columns' => [
                            ['class'=> 'yii\grid\SerialColumn'],
                            'id',
                            'isbn',
                            [
                                'attribute' => 'Title',
                                'format'=>'raw',
                                'value'=>function($model){ 
                                    $book = common\models\Book::find()->where(['title'=>$model->title])->one();
                                    return Html::a(''.$model->title.'',['book/view', 'id' => $book->id]);                                
                                }
                            ],
                            'year',
                            [
                                'label'=>'Publisher',
                                'format'=>'raw',
                                'value' =>function($model){                                    
                                    $publisher = \common\models\Publisher::find()->where(['id'=>$model->publisher_id])->one();
                                    return Html::a(''.$publisher->name.'',['publisher/view','id' => $publisher->id]);                                
                                }
                            ],                            
                        ],
                    ]) ?>
                    </div>
                 </div>
            </div>
        </div>
</section>
    
                   
                      
</div>