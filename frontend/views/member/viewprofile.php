<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;


$this->params['breadcrumbs'][] = "Profile ".$model->first_name." ".$model->last_name;
$this->title = 'Profile '.$model->first_name.' '.$model->last_name
?>
<?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>
<div class="book-index">
    <section class="content">
          <div class="row">
            <div class="col-xs-12">
                <div class="box-header">
                  <h3 class="box-title"><?= Html::a('', ['update'], ['class' => 'fa fa-pencil']) ?>  <?= Html::a('', ['/account/change_password'], ['class' => 'fa fa-cog']) ?></h3>                    
                  <div class="col-xs-3">
                      <?php if($model->photo){
                    echo '<img src="'.\Yii::$app->request->BaseUrl.'/'.$model->photo.'" width="200" height="250">';
                    //echo Html::a('Delete Photo',['member/deletephoto','id'=>$model->id],['class'=>'btn btn-danger']).'<p>';
                   }
                   else{
                       
                       echo '<img src="'.\Yii::$app->request->BaseUrl.'/assets/e0aeee82/img/avatar.png" width="160" height="170">';
                   }                   
                   ?>
                  </div>
                  <div class="col-xs-9"><p><?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'first_name',
                            'last_name',
                            'email:email',
                            'address',
                        ],
                    ])?>       
                </div>
                  </div>
              </div>
            </div>

    </section>>     
</div>
