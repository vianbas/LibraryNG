<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
$this->title = 'Register';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="login-box">
    <div class="login-logo">        
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <div class="login-logo">
        <a href="#">Register <b>Library</b>Ng</a>
        </div>
        <p class="login-box-msg">register / <a href="index.php?r=site/login" class="text-center">Login</a> to start your session</p>



        <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
        <?= $form->field($model, 'first_name') ?>
        <?= $form->field($model, 'last_name') ?>
        <?= $form->field($model, 'address') ?>
        <?= $form->field($model, 'email') ?>
        <?= $form->field($model, 'username') ?>
        <?= $form->field($model, 'password') ->passwordInput() ?>
        <?= $form->field($model, 'repassword') ->passwordInput() ?>     

        <div class="row">           
            <!-- /.col -->
            <div class="col-xs-4">
            <?= Html::submitButton('Register', ['class' => 'btn btnprimary', 'name' => 'signup-button']) ?>
            </div>
            <!-- /.col -->
        </div>


        <?php ActiveForm::end(); ?>
        <!-- /.social-auth-links -->
    </div>
    <!-- /.login-box-body -->
</div>