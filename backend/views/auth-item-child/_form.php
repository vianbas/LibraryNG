<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\AuthItemChild */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="auth-item-child-form">

    <?php $form = ActiveForm::begin(); ?>
    <?=$form->field($model, 'parent')->dropDownList(\yii\helpers\ArrayHelper::map(\backend\models\AuthItem::find()->asArray()->all(), 'name', 'name'), ['prompt'=>'-Choose Parent Name-']) ?>


    <?=$form->field($model, 'child')->dropDownList(\yii\helpers\ArrayHelper::map(\backend\models\AuthItem::find()->asArray()->all(), 'name', 'name'), ['prompt'=>'-Choose child Name-']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
