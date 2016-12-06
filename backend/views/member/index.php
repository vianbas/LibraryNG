<?php

use yii\helpers\Html;
use yii\grid\GridView;
$this->title = 'Members';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="member-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <section class="content">
        <p><?= Html::a('Create Member', ['create'], ['class' => 'btn btn-success']) ?></p>
          <div class="row">
            <div class="col-xs-12">
           
                        <?= GridView::widget([
                        'dataProvider' => $allmembers,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            'account_id',
                            'first_name',
                            'last_name',
                            'email:email',
                            ['class' => 'yii\grid\ActionColumn'],
                        ],
                        ]); ?>           
            </div>
          </div>
    </section>> 
</div>
