<?php
namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use common\models\LoginForm;
use yii\filters\VerbFilter;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

     public function actionIndex()
    {
         $time = date("Y-m-d");
//        $query_Belum_di_approve = \common\models\Loan::find()->where(['start_date'=>"0000-00-00",'due_date'=>Null])->one()->count();       
        $request = Yii::$app->db->createCommand("SELECT count(*) from loan where start_date = '0000-00-00' and due_date is Null")->queryScalar();
        $notReturn = Yii::$app->db->createCommand("SELECT count(*) from loan where start_date != '0000-00-00' and return_date is Null")->queryScalar();                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       
        $expired = Yii::$app->db->createCommand('SELECT count(*) from loan where datediff("'.$time.'",due_date)>0 and return_date is Null')->queryScalar();
        $total = Yii::$app->db->createCommand("SELECT count(*) from loan where start_date !='0000-00-00' ")->queryScalar();
        $members = Yii::$app->db->createCommand("SELECT count(*) from member where account_id in(select user_id from auth_assignment where item_name ='member') ")->queryScalar();
        if(!Yii::$app->user->can('member') || Yii::$app->user->isGuest){
            $this->redirect(['site/login']);
        }
        $loan = \common\models\Loan::find()->where(['due_date'=>$time]);
        
        $loan_due_date = new \yii\data\ActiveDataProvider([
            'query'=>$loan,
            'pagination'=>['pageSize'=>10]            
        ]);
        return $this->render('index',[
            'belum_di_Approve'=>$request,
            'belum_di_kembalikan'=>$notReturn,
            'expired'=>$expired,
            'total'=>$total,
            'members'=>$members,
            'loan_due_date' =>$loan_due_date
        ]);
    }
    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        if (Yii::$app->user->isGuest) {
            return $this->redirect(@Yii::$app->urlManagerFrontend->baseUrl);
        }
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            if(Yii::$app->user->can('staff')){
               return $this->goBack();                
            }
            else
            {
               return $this->redirect(@Yii::$app->urlManagerFrontend->baseUrl);
            }
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
//        die(@Yii::$app->urlManagerFrontend);
        return $this->redirect(@Yii::$app->urlManagerFrontend->baseUrl.'/?r=site/login');
    }
        public function actionRegister()
    {
        $model = new \common\models\RegistrationForm();
        $model->scenario = 'register';
        if ($model->load(Yii::$app->request->post())) {
        if ($user = $model->register()) {
            return $this->redirect(['site/index']);
         }
        }
        return $this->render('register',[
        'model' => $model,
        ]);
    }
}
