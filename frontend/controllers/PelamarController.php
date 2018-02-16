<?php

namespace frontend\controllers;

use Yii;
use yii\base\Model;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\Pelamar;
use frontend\models\DetailLowongan;
use frontend\models\PelamarSearch;
use yii\web\UploadedFile;

/**
 * PelamarController implements the CRUD actions for Pelamar model.
 */
class PelamarController extends Controller
{
    
    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg']
        ];
    }
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['create', 'update', 'view'],
                'rules' => [
                    [
                 'allow' => true,
                 'roles' => ['@'],
                    ],   
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    protected function handlePostSave(Pelamar $model)
	{
    if ($model->load(Yii::$app->request->post())) {
        $model->imageFile = UploadedFile::getInstance($model, 'imageFile');

        if ($model->validate()) {
            if ($model->imageFile) {
                $filePath = 'uploads/image/' . $model->imageFile->baseName . '.' . $model->imageFile->extension;
                if ($model->imageFile->saveAs($filePath)) {
                    $model->foto = $filePath;
                }
            }

            if ($model->save(false)) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }
    }
	}

    /**
     * Lists all Pelamar models.
     * @return mixed
     */
    /* public function actionIndex()
    {
        $searchModel = new PelamarSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    } */

    /**
     * Displays a single Pelamar model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Pelamar model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    /* public function actionCreate()
    {
        $model = new Pelamar();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    } */

    /**
     * Updates an existing Pelamar model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $this->handlePostSave($model);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Pelamar model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    /* public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    } */

    

    /**
     * Finds the Pelamar model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Pelamar the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pelamar::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
