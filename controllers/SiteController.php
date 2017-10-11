<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Contact;
use app\models\Email;
use app\models\User;
use app\models\Info;
use yii\web\UploadedFile;

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
                'only' => ['logout'],
                'rules' => [
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
     * @return string
     */
    public function actionIndex()
    {
        $info = Info::find()->orderBy(['id' => SORT_DESC])->one();
        $id = $info->id;
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post())) {

            $timeArray = explode('/', Yii::$app->request->post()['Info']['time']);
            $gregorian = Yii::$app->datetime->jalali_to_gregorian($timeArray[0], $timeArray[1], $timeArray[2]);
            $timestamp =mktime(0, 0, 0, $gregorian[1], $gregorian[2], $gregorian[0]);
            $date = new \DateTime();
            $date->setTimestamp($timestamp);
            $date = $date->format('Y-m-d H:i:s');
            $model->time = $date;
            if ($_FILES['Info']['name']['imageFile'] == '') {
                if ($model->save()) {
                    return $this->redirect(['index']);
                }
            } else {
                $filename = uniqid();
                $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
                $model->logo = $filename.'.'.$model->imageFile->extension;
                if ($model->save()) {
                    if ($model->upload($filename)) {
                        return $this->redirect(['index']);
                    }
                }
            }
            return $this->redirect(['site/index', 'id' => $model->id]);
        } else {
            $timeArray = explode('-', date('Y-m-d', strtotime($model->time)));
            $jalaliArray = Yii::$app->datetime->gregorian_to_jalali($timeArray[0], $timeArray[1], $timeArray[2]);
            $jalali = implode('/', $jalaliArray);

            return $this->render('index', [
                'model' => $model,
                'jalaliDate' => $jalali,
            ]);
        }
    }

    protected function findModel($id)
    {
        if (($model = Info::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        $lastone = User::find()->one();
        $model = new User();
        if (Yii::$app->request->post()) {
            $password = Yii::$app->request->post()['password'];
            $user = User::find()->where(['password' => $password])->one();

            if ($user) {
                return $this->redirect(['index']);
            } else {
                return $this->redirect(['login']);
            }
        }

        $sendmail = Yii::$app->request->post("email");


        if ($lastone->email == $sendmail) {

            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < 50; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
//                return $randomString;
            $lastone->token = $randomString;
            $lastone->save(false);


            $baseurl = Yii::$app->request->hostInfo.Yii::$app->request->baseUrl;
            Yii::$app->mailer->compose()
                ->setFrom('info@barangfood.com')
                ->setTo($sendmail)
                ->setSubject('new password')
                ->setTextBody('<a href="' . $baseurl .'/site/changepass?id=' . $randomString . '">confirm your new password</a>')
                ->setHtmlBody('<a href="' . $baseurl .'/site/changepass?id=' . $randomString . '">confirm your new password</a>')
                ->send();

        } else {
        }

        return $this->renderPartial('login', [
            'model' => $model,
            'lastone' => $lastone
        ]);
    }

    public function actionChangepass()
    {
        $id = $_GET['id'];
        $model = User::find()->one();
        if ($model->token == $id) {
            $model = User::find()->one();
//            $post=Yii::$app->request->post();
//            var_dump(Yii::$app->request->post()['User']['password']);
//            exit;
            if (isset(Yii::$app->request->post()['User']['password'])) {
                $model->password = Yii::$app->request->post()['User']['password'];
                $model->repeatpassword = Yii::$app->request->post()['User']['repeatpassword'];
            }
            $model->save();
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['login']);
            } else {
                return $this->render('changepass', [
                    'model' => $model
                ]);
            }
        }

    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }


    public function actionFront()
    {
        if (Yii::$app->request->isAjax && !isset(Yii::$app->request->get()['Contact'])) {
            $data = Yii::$app->request->get();
            $lastmail = $data['email'];
            $model = new Email();
            $model->email = $lastmail;
            if ($model->save()) {
                return true;
            } else {
                return false;
            }
        }

        if (Yii::$app->request->isAjax && isset(Yii::$app->request->get()['Contact'])) {
            $data = Yii::$app->request->get()['Contact'];
            $name = $data['name'];
            $email = $data['email'];
            $message = $data['message'];
            $contact = new Contact();
            $contact->name = $name;
            $contact->email = $email;
            $contact->message = $message;
            //    if ($contact->save(FALSE)) {
            //      return Json::encode($contact->message);
            //    }
            if ($contact->save()) {
                return true;
            } else {
                return false;
            }
        }


        $info = Info::find()->orderBy(['id' => SORT_DESC])->one();

        return $this->renderPartial('front', [
            'info' => $info,

        ]);
    }

}
