<?php
use yii\helpers\Html;
use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\BookSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Books';
$this->params['breadcrumbs'][]=$this->title;
?>
<div class="book-index">    
        <p><?= Html::a('Create Book', ['create'], ['class' => 'btn btn-success']) ?></p>
          <div class="row">
            <div class="col-xs-12">
             
                <div class="box-header">
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            'id',
                            [
                                'attribute' => 'author',
                                'format'=>'raw',
                                'value'=>function($model){
                                    return Html::a(''.$model->author->first_name.'',['author/view', 'id' => $model->author->id]);                                
                                }
                            ],
                            [
                                'attribute' => 'publisher',
                                'value'=>'publisher.name',
                                'format'=>'raw',
                                'value'=>function($model){
                                    return Html::a(''.$model->publisher->name.'',['publisher/view', 'id' => $model->publisher->id]);                                
                                }
                            ],        
                            'isbn',
                            'title',
                           
                            ['class' => 'yii\grid\ActionColumn'],
                        ],
                    ]); ?>
                </div>
              </div>
            </div>
          </div>
