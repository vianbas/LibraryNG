<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model backend\models\Book */
/* @var $form yii\widgets\ActiveForm */
?>
<?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>
            <div class="col-md-11">             
                 <!-- form start -->
                 <form role="form">
                  <div class="box-body">
                    <div class="form-group">
                      <?=$form->field($model, 'author_id')->dropDownList(\yii\helpers\ArrayHelper::map(backend\models\Author::find()->asArray()->all(), 'id','first_name'), ['prompt'=>'-Choose Authors Name-']) ?>
                    </div>
                    <div class="form-group">
                     <?=$form->field($model, 'publisher_id')->dropDownList(\yii\helpers\ArrayHelper::map(backend\models\Publisher::find()->asArray()->all(), 'id', 'name'), ['prompt'=>'-Choose a Course-']) ?> 
                    </div>
                    <div class="form-group">
                     <?= $form->field($model, 'isbn')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="form-group">
                     <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>      
                    </div>
                    <div class="form-group">
                        <?= $form->field($model, 'year')->textInput(['maxlength' => true]) ?> 
                    </div>
                    <div class="form-group">
                        <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
                    </div>    
                    <div class="form-group">
                        <?= $form->field($model, 'file')->fileInput() ?>
                    </div>    
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <center><?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?></center>
                  </div>
                </form>
              </div><!-- /.box -->
         
    <?php ActiveForm::end(); ?>
