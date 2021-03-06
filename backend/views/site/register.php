<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
$this->title = 'Register';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
 <h1><?= Html::encode($this->title) ?></h1>
 <p>Please fill out the following fields to register:</p>
<div class="row">
 <div class="col-lg-5">
 <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
<?= $form->field($model, 'first_name') ?>
<?= $form->field($model, 'last_name') ?>
<?= $form->field($model, 'address') ?>
<?= $form->field($model, 'email') ?>
<?= $form->field($model, 'date_of_birth') ?>
<?= $form->field($model, 'sex') ?>
 <?= $form->field($model, 'username') ?>
 <?= $form->field($model, 'password') ->passwordInput() ?>
 <?= $form->field($model, 'repassword') ->passwordInput() ?>    
 <div class="form-group">
 <?= Html::submitButton('Register', ['class' => 'btn btnprimary', 'name' => 'signup-button']) ?>
 </div>
 <?php ActiveForm::end(); ?>
 </div>
 </div>
</div