<?php

namespace backend\controllers;

use Yii;
use backend\models\Pengumuman;
use backend\models\PengumumanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;

/**
 * PengumumanController implements the CRUD actions for Pengumuman model.
 */
class PengumumanController extends Controller
{
    const ROLE_ADMIN = 10;
    const ROLE_HRD = 20;


    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access'=> [
                'class'=>AccessControl::className(),
                'rules'=>[
                    [
                        'actions'=>[
                            'index',
                            'create',
                            'update',
                            'delete',
                            'view'
                        ],
                        'allow'=> true,
                        'matchCallback'=>function(){
                            return (
                                Yii::$app->user->identity->status==self::ROLE_ADMIN
                            );
                        }
                    ],
                    [
                        'actions'=>[
                            'index',
                            'create',
                            'update',
                            'view'
                        ],
                        'allow'=> true,
                        'matchCallback'=>function(){
                            return (
                                Yii::$app->user->identity->status==self::ROLE_HRD
                            );
                        }
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

    protected function handlePostSave(Pengumuman $model)
	{
    if ($model->load(Yii::$app->request->post())) {
        $model->pdfFile = UploadedFile::getInstance($model, 'pdfFile');

        if ($model->validate()) {
            if ($model->pdfFile) {
                $filePath = 'uploads/document/' . $model->pdfFile->baseName . '.' . $model->pdfFile->extension;
                if ($model->pdfFile->saveAs($filePath)) {
                    $model->file_pengumuman = $filePath;
                }
            }

            if ($model->save(false)) {
                return $this->redirect(['view', 'id' => $model->id_pengumuman]);
            }
        }
    }
	}

    /**
     * Lists all Pengumuman models.
     * @return mixed
     */
    public function actionIndex()
    {
        $model = new Pengumuman();
        $searchModel = new PengumumanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
        ]);
    }

    /**
     * Displays a single Pengumuman model.
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
     * Creates a new Pengumuman model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Pengumuman();
        $this->handlePostSave($model);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_pengumuman]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Pengumuman model.
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
            return $this->redirect(['view', 'id' => $model->id_pengumuman]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Pengumuman model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Pengumuman model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Pengumuman the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pengumuman::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
