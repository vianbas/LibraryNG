<?php

namespace frontend\controllers;

use Yii;
use common\models\Publisher;
use common\models\PublisherSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\Book;
/**
 * PublisherController implements the CRUD actions for Publisher model.
 */
class PublisherController extends Controller
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
     * Lists all Publisher models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(!Yii::$app->user->can('browse')){
            throw new \yii\web\ForbiddenHttpException;
        } 
        $searchModel = new PublisherSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Publisher model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        if(!Yii::$app->user->can('browse')){
            throw new \yii\web\ForbiddenHttpException;
        } 
        
        $books = Book::find()->where(['publisher_id'=>$id]);        
        
        $DataProvider = new  \yii\data\ActiveDataProvider(
        [
         'query'=>$books,
         'pagination'=>['pageSize'=>10]
        ]);
        
        return $this->render('view', [
            'model' => $this->findModel($id),
            'dataProvider'=>$DataProvider,
        ]);
    }

    /**
     * Creates a new Publisher model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
         if(!Yii::$app->user->can('manage_publisher')){
            throw new \yii\web\ForbiddenHttpException;
        } 
        $model = new Publisher();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Publisher model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
                 if(!Yii::$app->user->can('manage_publisher')){
            throw new \yii\web\ForbiddenHttpException;
        } 
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
     * Deletes an existing Publisher model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        if(!Yii::$app->user->can('manage_publisher')){
            throw new \yii\web\ForbiddenHttpException;
        } 
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Publisher model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Publisher the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Publisher::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
