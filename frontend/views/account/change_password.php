<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\widgets\Alert;

/* @var $this yii\web\View */
/* @var $model common\models\Account */
/* @var $form yii\widgets\ActiveForm */

$model = \common\models\Member::find()->where(['account_id'=>Yii::$app->user->id])->one();
$this->title = "Change Password";
$this->params['breadcrumbs'][] = ['label' =>"Profile ".$model->first_name.' '.$model->last_name, 'url' => ['member/viewprofile', 'id' => $model->id]];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="account-form">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($user, 'currentPassword')->passwordInput(['maxlength' => true]) ?>
    <?= $form->field($user, 'newPassword')->passwordInput(['maxlength' => true]) ?>
    <?= $form->field($user, 'newPasswordConfirm')->passwordInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Submit',['class' =>'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
