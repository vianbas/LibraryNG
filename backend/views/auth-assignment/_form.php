<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\AuthAssignment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="auth-assignment-form">

    <?php $form = ActiveForm::begin(); ?>
    <?=$form->field($model, 'item_name')->dropDownList(\yii\helpers\ArrayHelper::map(\backend\models\AuthItem::find()->where("name like 'administrator' or name like 'member' or name like 'staff' ")->asArray()->all(), 'name', 'name'), ['prompt'=>'-Choose Item Name-']) ?>
     
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
