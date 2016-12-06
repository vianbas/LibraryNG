<?php
use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Publishers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="publisher-index">
    
    <section class="content">
          <div class="row">
            <div class="col-md-12">
                <?php  echo $this->render('_search', ['model' => $searchModel]); ?>
                <div class="box-header with-border">             
                </div><!-- /.box-header -->
                <div class="box-body">      
                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    //'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        'id',
                        'name',
                    ],
                ]); ?>
                    </div>
             
            </div>
        </div>
</section>
</div>
