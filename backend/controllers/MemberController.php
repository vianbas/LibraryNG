<?php

namespace backend\controllers;

use Yii;
use backend\models\Member;
use backend\models\MemberSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

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
        
        $members = Yii::$app->db->createCommand("select user_id from auth_assignment where item_name = 'member'")->queryColumn();        
        $member = \common\models\Member::find()->andFilterWhere(['account_id'=>$members]);        
        $searchModel = new MemberSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $allmembers = new \yii\data\ActiveDataProvider([
            'query'=>$member,
        ]);
        
        
        if(Yii::$app->user->can('administrator')){
            $allmembers = $dataProvider;
        }
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'allmembers' => $allmembers
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

    /**
     * Creates a new Member model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        
        $model = new Member();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
    public function actionViewprofile($id)
    {
        return $this->render('viewprofile', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Updates an existing Member model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        if(!Yii::$app->user->can('member')){
            throw new \yii\web\ForbiddenHttpException;
        } 
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
    /**
     * Deletes an existing Member model.
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
