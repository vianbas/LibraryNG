<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Member */

$this->title = 'Update Member: ' . ' ' . $model->first_name.' '.$model->last_name;
$this->params['breadcrumbs'][] = ['label' => $model->first_name.' '.$model->last_name, 'url' => ['viewprofile', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="member-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
