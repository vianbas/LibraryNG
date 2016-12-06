<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $model frontend\models\Publisher */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Publishers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="publisher-view">
   
    <section class="content">
          <div class="row">
            <div class="col-md-12">
             <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Publisher <?= Html::encode($this->title) ?></h3>
                </div><!-- /.box-header -->
                <div class="box-body">                                 
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'id',
                        'name',
                    ],
                ]) ?>
               </div></div></div></div>
               <div class="row">
                    <div class="col-md-12">
                      <div class="box">
                        <div class="box-header with-border">
                          <h3 class="box-title">Books of Publisher <?= Html::encode($this->title) ?></h3>
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
                                'attribute' => 'Author',
                                'format'=>'raw',
                                'value'=>function($model){ 
                                    $author = common\models\Author::find()->where(['id'=>$model->id])->one(); 
                                    return Html::a(''.$author->first_name." ".$author->last_name.'',['author/view', 'id' => $author->id]);                                
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
