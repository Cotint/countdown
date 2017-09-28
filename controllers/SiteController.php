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
//      $model = new Info();
      $info=Info::find()->orderBy(['id'=> SORT_DESC])->one();
      $id=$info->id;
      $model = $this->findModel($id);
      if ($model->load(Yii::$app->request->post()) && $model->save()) {
        return $this->redirect(['info/update','id'=>$model->id]);
      } else {
        return $this->render('index', [
          'model' => $model,
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
      if ($model->load(Yii::$app->request->post())) {

        $last=User::find()->one();
        $user = User::find()->where(['password'=>$model->password])->one();

        if ($user){
          return $this->redirect(['index']);
        }
        else {
          return $this->redirect(['login']);
        }
      }

            $sendmail=Yii::$app->request->post("email");


        if($lastone->email == $sendmail){


                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $charactersLength = strlen($characters);
                $randomString = '';
                for ($i = 0; $i < 50; $i++) {
                    $randomString .= $characters[rand(0, $charactersLength - 1)];
                }
//                return $randomString;
                $lastone->token= $randomString;
                $lastone->save();

        Yii::$app->mailer->compose()
            ->setFrom('a.behdinian@gmail.com')
            ->setTo($sendmail)
            ->setSubject('new password')
            ->setTextBody('<a href="http://localhost/basic/web/site/changepass?id='.$randomString.'">confirm your password</a>')
            ->setHtmlBody('<a href="http://localhost/basic/web/site/changepass?id='.$randomString.'">confirm your password</a>')
            ->send();

        }else{}

      return $this->render('login', [
        'model' => $model,
        'lastone'=>$lastone
      ]);
    }

    public function actionChangepass()
    {
        $id=$_GET['id'];
        $model = User::find()->one();
        if($model->token == $id)
        {
            $model = User::find()->one();
//            $post=Yii::$app->request->post();
//            var_dump(Yii::$app->request->post()['User']['password']);
//            exit;
            if(isset(Yii::$app->request->post()['User']['password'])) {
                $model->password = Yii::$app->request->post()['User']['password'];
                $model->repeatpassword = Yii::$app->request->post()['User']['repeatpassword'];
            }
            $model->save();
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['login']);
            }
            else{
                return $this->render('changepass', [
                    'model'=>$model
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


     if(Yii::$app->request->isAjax){
       $data=Yii::$app->request->get();
       $lastmail = $data['email'];
       $model = new Email();
       $model->email = $lastmail;
       if($model->save()) {
         return true;
       }
       else {
         return false;
       }
     }

  if(Yii::$app->request->isAjax){
     $data=Yii::$app->request->get();
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
     if($contact->save()) {
       return true;
     }
     else {
       return false;
     }
   }


     $info = Info::find()->orderBy(['id'=> SORT_DESC])->one();

  return $this->renderPartial('front',[
    'info'=>$info,

  ]);
}
}
