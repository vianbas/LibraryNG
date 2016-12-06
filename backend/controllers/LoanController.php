<?php

namespace backend\controllers;

use Yii;
use backend\models\Loan;
use backend\models\LoanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LoanController implements the CRUD actions for Loan model.
 */
class LoanController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Loan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new LoanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);        
        $query_Belum_di_approve = \common\models\Loan::find()->where(['start_date'=>"0000-00-00",'due_date'=>Null]);       
        $belum_di_Approve = new \yii\data\ActiveDataProvider(
           [
               'query'=>$query_Belum_di_approve,
               'pagination'=>['pageSize'=>10]
           ]     
        );
        $time = date("Y-m-d");
        $loan = \common\models\Loan::find()->where(['datediff("'.$time.'",due_date) <' =>'0','return_date'=>Null]);
        $loan_count = \common\models\Loan::find()->where(['datediff("'.$time.'",due_date) <' =>'0','return_date'=>Null]);
        $belum_jatuh_Tempo = new \yii\data\ActiveDataProvider(
           [               
               'query'=> $loan,
               'pagination'=>['pageSize'=>10]
           ]     
        );        
        $sudah = \common\models\Loan::find()->where(['datediff("'.$time.'",due_date) >' =>'0','return_date'=>Null])->orderBy('start_date');
        $sudah_jatuh_Tempo = new \yii\data\ActiveDataProvider(
           [               
               'query'=> $sudah,
               'pagination'=>['pageSize'=>10]
           ]     
        );
               
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'belum_di_Approve'=>$belum_di_Approve,
            'belum_jatuh_tempo'=>$belum_jatuh_Tempo,
            'sudah_jatuh_tempo'=>$sudah_jatuh_Tempo,
        ]);
    }
    
    public function actionApprove($id,$copy_id)
    {
        $member = \common\models\Member::find()->where(['account_id'=>Yii::$app->user->id])->one();
        $time = date("Y-m-d");
        //$times = "2015-12-18";
        $loan_borrower = \common\models\Loan::find()->where(['id'=>$id])->one();        
        $loan_borrower->start_date = $time;
        $loan_borrower->due_date = date("Y-m-d",  strtotime($time.'+3 days'));
        $loan_borrower->staff_id = $member->id;
        $loan_borrower->save();
        $book_copy = \common\models\BookCopy::find()->where(['id'=>$copy_id])->one();
        $book_copy->availability = 0;
        $book_copy->save();
        $this->redirect(['/loan']);
    }
    
    public function actionReturn($id,$copy_id)
    {
        $time = date("Y-m-d");
        $loan = new \common\models\Loan();
        $loan_borrower = \common\models\Loan::find()->where(['id'=>$id])->one();
        $loan_borrower->return_date = $time;        
        $diff = Yii::$app->db->createCommand('SELECT datediff("'.$time.'",due_date) FROM loan where id = '.$id)->queryScalar();   
        if($diff>0){
            $loan_borrower->fines = $diff*200;
        }
        $copybook =  \common\models\BookCopy::find()->where(['id'=>$copy_id])->one();
        $copybook->availability = 1;
        $copybook->save();
        $loan_borrower->save();
        Yii::$app->session->setFlash('success','Book has Returned');
        $this->redirect(['/loan']);
    }
    
    public function actionReject($id)
    {
        $loan = new \common\models\Loan();
        $loan_borrower = \common\models\Loan::find()->where(['id'=>$id])->one();
        $loan_borrower->due_date = '0000-00-00';
        $loan_borrower->save();
        Yii::$app->session->setFlash('danger','reject');
        $this->redirect(['/loan']);
    }

    /**
     * Displays a single Loan model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Loan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Loan();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Loan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Loan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the Loan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Loan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Loan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
