<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\BookCopySearch */
/* @var $form yii\widgets\ActiveForm */
$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback'],
    'template' => "{input}<span class='fa fa-search form-control-feedback'></span>"
];
?>

<div class="book-copy-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php //$form->field($model, 'id') ?>

    
    <div class="row">
    <div class="col-md-3">
    <?= $form
            ->field($model, 'book',$fieldOptions1) 
            ->label('Search Book Copy Title')
            ->textInput(['placeholder' => "search Book Copy Title"])?>       
      </div>
     </div>   

    <?php //$form->field($model, 'call_number') ?>

    <?php //$form->field($model, 'year') ?>

    <?php //$form->field($model, 'availability') ?>

    <?php // echo $form->field($model, 'loanable') ?>



    <?php ActiveForm::end(); ?>

</div>
