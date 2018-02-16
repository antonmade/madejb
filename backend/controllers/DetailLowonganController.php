<?php

namespace backend\controllers;

use Yii;
use backend\models\DetailLowongan;
use backend\models\DetailLowonganSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DetailLowonganController implements the CRUD actions for DetailLowongan model.
 */
class DetailLowonganController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all DetailLowongan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DetailLowonganSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single DetailLowongan model.
     * @param integer $id
     * @param integer $id_lowongan
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id, $id_lowongan)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $id_lowongan),
        ]);
    }

    /**
     * Creates a new DetailLowongan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new DetailLowongan();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'id_lowongan' => $model->id_lowongan]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing DetailLowongan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $id_lowongan
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id, $id_lowongan)
    {
        $model = $this->findModel($id, $id_lowongan);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'id_lowongan' => $model->id_lowongan]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing DetailLowongan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $id_lowongan
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id, $id_lowongan)
    {
        $this->findModel($id, $id_lowongan)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the DetailLowongan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $id_lowongan
     * @return DetailLowongan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $id_lowongan)
    {
        if (($model = DetailLowongan::findOne(['id' => $id, 'id_lowongan' => $id_lowongan])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
