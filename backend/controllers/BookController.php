<?php

namespace backend\controllers;

use Yii;
use common\models\Book;
use common\models\BookSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * BookController implements the CRUD actions for Book model.
 */
class BookController extends Controller
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
    
    public function actionBorrow($id,$book_id) {
        $loan = new \common\models\Loan();        
        $bookcopy = Yii::$app->db->createCommand('select id from book_copy where book_id = '.$book_id)->queryColumn();       
        $in = '(';
        for($i=0;$i<sizeof($bookcopy);$i++){
            if($i==(sizeof($bookcopy)-1)){
                $in = $in.$bookcopy[$i].')';
            }
            else
            {
                $in = $in.$bookcopy[$i].',';
            }
        }
        //die($in);
        $member = \common\models\Member::find()->where(['account_id'=>Yii::$app->user->id])->one();
        $user = $member->id;
        $loancount = Yii::$app->db->createCommand('select count(*) from loan where return_date is NULL and borrower_id = '.$user.' and copy_id in '.$in)->queryScalar();
        if($loancount==0){
            //cek untuk uda 3 apa belum yang dipinjam nya
            $loancount_ = Yii::$app->db->createCommand('select count(*) from loan where return_date is NULL and borrower_id = '.$user)->queryScalar();
            if($loancount_<3){
                $loan->copy_id = $id;
                $loan->borrower_id = $user;
                $loan->save();   
            }
            else{
                Yii::$app->session->setFlash('danger','you can just borrow max 3 Book');
                return $this->redirect(['/book/view','id'=>$book_id]);     
            }
            }
            else {
                Yii::$app->session->setFlash('danger','You have been borrowed this book');
                return $this->redirect(['/book/view','id'=>$book_id]);     
            }
                return $this->redirect(['//loan']);
    }

    /**
     * Lists all Book models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(!Yii::$app->user->can('admin_book')){
            throw new \yii\web\ForbiddenHttpException;
        } 
        $searchModel = new BookSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        
        ]);
    }
    public function actionViewbookcopy($id)
    {
        $bookcopy = \common\models\BookCopy::find()->where(['id'=>$id])->one();
        return $this->render('viewbookcopy', [
            'model' => $bookcopy,
        ]);
    }
    /**
     * Displays a single Book model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        if(!Yii::$app->user->can('admin_book')){
            throw new \yii\web\ForbiddenHttpException;
        } 
        $bookcopy = new \backend\models\BookCopy();
        $books = Book::find()->where(['id'=>$id])->one();
        $bookCopi = \backend\models\BookCopy::find()->where(['Book_id'=>$books->id]);
        
        $DataProvider = new \yii\data\ActiveDataProvider(
           [
               'query'=>$bookCopi,
               'pagination'=>['pageSize'=>10]
           ]     
        );
        
        //$auth = Yii::$app->getAuthManager();   
//        $curuser = Yii::$app->user->id;
//        if(!$auth->checkAccess($curuser,'view_book')){
//            throw new \yii\web\ForbiddenHttpException;
//        } 
        
        return $this->render('view', [
            'model' => $this->findModel($id),
            'bookcopy' => $bookcopy,
            'dataProvider'=>$DataProvider,
        ]);
    }
    


    /**
     * Creates a new Book model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(!Yii::$app->user->can('create_book')){
            throw new \yii\web\ForbiddenHttpException;
        } 
        $model = new Book();
        if ($model->load(Yii::$app->request->post())) {
            $model->file = UploadedFile::getInstance($model,'file');
            
            if($model->file){
                $imagepath = 'uploads/books/';
                $model->photo = $imagepath.rand(10,100).$model->file->name;
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
     * Updates an existing Book model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        if(!Yii::$app->user->can('update_book')){
            throw new \yii\web\ForbiddenHttpException;
        } 
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post())) {            
            $model->file = UploadedFile::getInstance($model,'file');            
            if($model->file){
                
                $imagepath = 'uploads/books/';
                $model->photo = $imagepath.rand(10,100).$model->file->name;                
            }
            if($model->save()){
                if($model->file){                    
                    $model->file->saveAs($model->photo);
                }
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Book model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        if(!Yii::$app->user->can('delete_book')){
            throw new \yii\web\ForbiddenHttpException;
        } 
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }
            

    /**
     * Finds the Book model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Book the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Book::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
