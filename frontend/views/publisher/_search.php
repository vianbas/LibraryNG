<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\PublisherSearch */
/* @var $form yii\widgets\ActiveForm */
$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback'],
    'template' => "{input}<span class='fa fa-search form-control-feedback'></span>"
];
?>

<div class="publisher-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php //$form->field($model, 'id') ?>
    <div class="row">
    <div class="col-md-3">
    <?= $form
            ->field($model, 'name',$fieldOptions1) 
            ->label('Search Book Title')
            ->textInput(['placeholder' => "search publisher name"])?>
   
    <?php ActiveForm::end(); ?>
      </div>
     </div>   
</div>
