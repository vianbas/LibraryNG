<?php
use yii\helpers\Html;
$this->title = 'Create Book';
?>
<div class="book-form">
    <section class="content">
        
        <?php $this->params['breadcrumbs'][] = $this->title; ?>    
        <?= $this->render('_form', [
        'model' => $model,
        ]) ?>
            
    </section>    
</div>
