<?php

namespace backend\controllers;

use Yii;
use backend\models\DetailNilai;
use backend\models\DetailNilaiSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * DetailNilaiController implements the CRUD actions for DetailNilai model.
 */
class DetailNilaiController extends Controller
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
     * Lists all DetailNilai models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DetailNilaiSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single DetailNilai model.
     * @param integer $id
     * @param integer $id_penilaian
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id, $id_penilaian)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $id_penilaian),
        ]);
    }

    /**
     * Creates a new DetailNilai model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new DetailNilai();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'id_penilaian' => $model->id_penilaian]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing DetailNilai model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $id_penilaian
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id, $id_penilaian)
    {
        $model = $this->findModel($id, $id_penilaian);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'id_penilaian' => $model->id_penilaian]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing DetailNilai model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $id_penilaian
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id, $id_penilaian)
    {
        $this->findModel($id, $id_penilaian)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the DetailNilai model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $id_penilaian
     * @return DetailNilai the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $id_penilaian)
    {
        if (($model = DetailNilai::findOne(['id' => $id, 'id_penilaian' => $id_penilaian])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
