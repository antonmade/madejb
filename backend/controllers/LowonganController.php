<?php

namespace backend\controllers;

use Yii;
use backend\models\Lowongan;
use backend\models\LowonganSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * LowonganController implements the CRUD actions for Lowongan model.
 */
class LowonganController extends Controller
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

    /**
     * Lists all Lowongan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new LowonganSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Lowongan model.
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
     * Creates a new Lowongan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Lowongan();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_lowongan]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Lowongan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_lowongan]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Lowongan model.
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
     * Finds the Lowongan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Lowongan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Lowongan::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
