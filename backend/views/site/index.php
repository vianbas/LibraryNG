<?php

use yii\helpers\Html;
use yii\grid\GridView;
/* @var $this yii\web\View */
$this->title = 'Dashboard';
$this->params['breadcrumbs'][]=$this->title;

?>
<div class="site-index">    
    <div class="col-md-7">
        <h3><span id="servertime"> </span></h3>
                <div class="box-header with-border">
                    <h3 class="box-title"></h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <div class>
                    <center> 
                        <batang> <H1> Welcome TO LibraryNG </H1></batang> 
                        Jl. Sisingamangaraja, Sitoluama
                        Laguboti, Toba Samosir
                        Sumatera Utara, Indonesia
                        Kode Pos: 22381
                        Telp: +62 632 331234
                        Fax: +62 632 331116
                    </center>      
                </div>
                <form role="form">
                  <div class="box-body">                    
                  </div><!-- /.box-body -->
                </form>
              <!-- /.box -->
    </div>
    
    <div class="col-md-5">
                <h4><?= Html::a('   info', [''], ['class' => 'fa fa-info-circle']) ?></h4>
                <div class="box-header with-border">
                    <h3 class="box-title"></h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form">
                  <div class="box-body">
                    <div class="form-group">
                        <h5>Loans Due Date Today</h5>
                        <?=  GridView::widget(
                            [
                                'dataProvider'=> $loan_due_date,
                                'columns'=>[
                                ['class' => 'yii\grid\SerialColumn'],                                        
                            [
                                'attribute' => 'Name',
                                'format'=>'raw',
                                'value'=>function($model){                                 
                                    return Html::a(''.$model->borrower->first_name.'',['//loan/view', 'id' => $model->id]);                                
                                }
                            ],
                            [
                               'attribute' => 'Book Title',
                               'format'=>'raw',
                               'value'=>function($model){
                                    return Html::a(''.$model->copy->book->title.'',['//loan/view', 'id' => $model->id]);                                
                                }
                            ],      
                                                    
                                ]
                            ]
                            )?>   
                    </div>
                    <br><br>  
                    <div class="form-group">
                      <label for="exampleInputEmail1">Request : <?= $belum_di_Approve ?> </label>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Borrowing : <?= $belum_di_kembalikan ?> </label>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Loan Expired : <?= $expired ?> </label>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Loan's Total : <?= $total ?> </label>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Total Members : <?= $members ?> </label>
                    </div>  
                     
                  </div><!-- /.box-body -->

                </form>
              <!-- /.box -->
    </div>
    
</div>
