<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Member;
use frontend\models\MemberSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;
/**
 * MemberController implements the CRUD actions for Member model.
 */

class MemberController extends Controller
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
     * Lists all Member models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(!Yii::$app->user->can('staff')){
            throw new \yii\web\ForbiddenHttpException;
        } 
        $searchModel = new MemberSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Member model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
    
    public function actionViewprofile()
    {
        if(!Yii::$app->user->can('browse')){
            throw new \yii\web\ForbiddenHttpException;
        } 
//        $member = $this->findModel(Yii::$app->user->id);
        $member  = \common\models\Member::find()->where(['account_id'=>Yii::$app->user->id])->one();
        return $this->render('viewprofile', [
            'model' => $this->findModel($member->id),
        ]);
    }

    /**
     * Creates a new Member model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        
        $model = new Member();

        if ($model->load(Yii::$app->request->post())) {
            $model->file = UploadedFile::getInstance($model,'file');
            
            if($model->file){
                $imagepath = 'uploads/member/';
                $model->photo = $imagepath.rand(10,100).$model->file->first_name;
            }
            if($model->save()){
                if($model->file){
                    $model->file->saveAs($model->photo);
                }
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Member model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate()
    {
        if(!Yii::$app->user->can('member')){
            throw new \yii\web\ForbiddenHttpException;
        } 
        $id = Yii::$app->user->id;
        $model = $this->findModel(['account_id'=>$id]);

        if ($model->load(Yii::$app->request->post())) {
            
            $model->file = UploadedFile::getInstance($model,'file');            
            if($model->file){
                $imagepath = 'uploads/member/';
                $model->photo = $imagepath.rand(10,100).$model->file->name;                
            }
            if($model->save()){
                if($model->file){                    
                    $model->file->saveAs($model->photo);
                }
            }
            Yii::$app->session->setFlash('success','You have succesfully update your profile');
            return $this->redirect(['viewprofile', 'id' => $model->id]);
        }else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
    
    
    public function actionDeletefoto($id)
    {
          $foto = \common\models\Member::find()->where(['id'=>$id])->one()->photo;
          if($foto){
              if(!unlink($foto)){
                  return false;
              }
          }
          $member = \common\models\Member::findOne($id);
          $member->photo = NULL;
          $member->update();
          
         return $this->redirect(['update']);
    }
 
    /**
     * Finds the Member model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Member the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Member::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
