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
    <section class="content">
          <div class="row">
            <div class="col-xs-12">
                <?php  echo $this->render('_search', ['model' => $searchModel]); ?>
                <div class="box-header">
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
//                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            'id',
                            'isbn',
                            [
                                'attribute' => 'author',
                                'format'=>'raw',
                                'value'=>function($model){ 
                                    $id = $model->author_id;
                                    $author = backend\models\Author::find()->where(['id'=>$id])->one();
                                    return Html::a(''.$author->first_name.' '.$author->last_name.'',['author/view', 'id' => $author->id]);                                
                                }
                            ],
                            [
                                'attribute' => 'title',
                                'format'=>'raw',
                                'value'=>function($model){                                 
                                    return Html::a(''.$model->title.'',['view', 'id' => $model->id]);                                
                                }
                            ],        
                        ],
                    ]); ?>
                </div>
              </div>

          </div>
    </section>>     
</div>
