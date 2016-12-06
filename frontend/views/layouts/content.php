<?php
use yii\widgets\Breadcrumbs;
use dmstr\widgets\Alert;
?>

<div class="content-wrapper">
    <section class="content-header"> 
        <div class="row">
            <div class="col-xs-12">             
                <?php if (isset($this->blocks['content-header'])) { ?>
                    <h1><?= $this->blocks['content-header'] ?></h1>
                <?php } else { ?>
                    <h3>
                        <?php
                        if ($this->title !== null || $this->title == 'Dashboard') {
                            if($this->title !== null && $this->title != 'Dashboard'){
                                echo \yii\helpers\Html::encode($this->title);
                            }
                        } else {
                            echo \yii\helpers\Inflector::camel2words(
                                \yii\helpers\Inflector::id2camel($this->context->module->id)
                            );
                            echo ($this->context->module->id !== \Yii::$app->id) ? '<small>Module</small>' : '';
                        } ?>
                   </h3>
                <?php } ?>
                <?= Breadcrumbs::widget(
                    [
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                    ]
                )?>
        <?= Alert::widget() ?>
        <?= $content ?>
             
            </div>
          </div>  
    </section>
</div>

<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 2.0
    </div>
   <center>Copyright &copy; 2014-2015 Yii version 2.0</a> All rights
    reserved.</center>
</footer>


