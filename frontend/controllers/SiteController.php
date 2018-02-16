<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\Html;
use frontend\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use frontend\models\Lowongan;

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
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
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
            'auth' => [
                'class' =>'yii\authclient\AuthAction',
                'successCallback' => [$this, 'successCallback'],
            ],
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Displays Job Vacancies
     *
     * @return mixed
     */
    public function actionJobVacancy()
    {
        //coba menampilkan dari database
        $query = Lowongan::find();
        $lowongans = $query->where(['status_lowongan'=>'1'])
            ->orderBy('id_lowongan')
            ->all();
        return $this->render('job-vacancy', [
                'lowongans' => $lowongans,
        ]);
        
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            Yii::$app->session->setFlash('success', 'Login Sukses!');
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Login social media
     *
     * @return mixed
     */
    public function successCallback($client)
    {
        $attributes = $client -> getUserAttributes();
        //user login atau sign up disini

        if($client->getId()=='google'){
        $email = $attributes['emails'][0]['value'];
        }
        else if($client->getId()=='live'){
            $email = $attributes['emails'];
            }
        else{
            $email = $attributes['email'];
        }
            $user = \frontend\models\Pelamar::find()
            ->where(['email'=>$email])
            ->one();
                
        if(!empty($user)){
            Yii::$app->user->login($user);
        }
        else{
            $this->redirect(['site/signup']);
            Yii::$app->session->setFlash('warning', 'You must sign up first!');
            
        }
        
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        /* $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]); */
       $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
        if ($user = $model->signup()) {
        $email = \Yii::$app->mailer->compose()
        ->setTo($user->email)
        ->setFrom([\Yii::$app->params['supportEmail'] => \Yii::$app->name])
        ->setSubject('Verifikasi Email EZ Company')
        ->setTextBody("Anda telah berhasil registrasi profil lamaran di EZ Company. Klik link untuk login ke halaman profil Anda. ".Yii::$app->urlManager->createAbsoluteUrl(
        ['site/confirm','id'=>$user->id,'key'=>$user->auth_key]
        )
        )
        ->send();
        if($email){
        Yii::$app->getSession()->setFlash('success','Check Your email!');
        }
        else{
        Yii::$app->getSession()->setFlash('warning','Failed, contact Admin!');
        }
        return $this->goHome();
        }
        }

                return $this->render('signup', [
                    'model' => $model,
                ]);
    }

    /**
     * Confirmation Email.
     *
     * @return mixed
     */
     public function actionConfirm($id, $key)
    {
        $user = \frontend\models\Pelamar::find()->where([
        'id'=>$id,
        'auth_key'=>$key,
        'status'=>0,
        ])->one();
        if(!empty($user)){
            $user->status=10;
            $user->save();
            //user langsung login
            Yii::$app->user->login($user);
            Yii::$app->getSession()->setFlash('success','Success!');
        }
        else{
            Yii::$app->getSession()->setFlash('warning','Failed!');
        }       
        return $this->goHome();
    } 

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
}
