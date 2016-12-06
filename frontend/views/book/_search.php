<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\BookSearch */
/* @var $form yii\widgets\ActiveForm */
$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback'],
    'template' => "{input}<span class='fa fa-search form-control-feedback'></span>"
];

?>

<div class="book-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php //$form->field($model, 'id') ?>

    <?php //$form->field($model, 'author_id') ?>

    <?php //$form->field($model, 'publisher_id') ?>
    
    <?php //$form->field($model, 'isbn') ?>
    <div class="row">
    <div class="col-md-3">
    <?= $form
            ->field($model,'title',$fieldOptions1)
            ->label('Search Book Title')
            ->textInput(['placeholder' => "search book title"])
    ?>    
    </div>  
    <div class="col-md-4">
    </div>   
    </div>    
    <?php // echo $form->field($model, 'year') ?>

    <?php // echo $form->field($model, 'description') ?>

    <div class="form-group">

        <?php //Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
