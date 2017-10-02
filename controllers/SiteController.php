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
            $timeArray = explode('/', Yii::$app->request->post()['time']);
            $gregorian = $this->jalali_to_gregorian($timeArray[0], $timeArray[1], $timeArray[2]);
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
                $model->logo = $filename;
                $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
                if ($model->save()) {
                    if ($model->upload($filename)) {
                        return $this->redirect(['index']);
                    }
                }
            }
            return $this->redirect(['info/update', 'id' => $model->id]);
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

            $last = User::find()->one();
            $user = User::find()->where(['password' => $model->password])->one();

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
            $lastone->save();

            Yii::$app->mailer->compose()
                ->setFrom('a.behdinian@gmail.com')
                ->setTo($sendmail)
                ->setSubject('new password')
                ->setTextBody('<a href="http://localhost/basic/web/site/changepass?id=' . $randomString . '">confirm your password</a>')
                ->setHtmlBody('<a href="http://localhost/basic/web/site/changepass?id=' . $randomString . '">confirm your password</a>')
                ->send();

        } else {
        }

        return $this->render('login', [
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

    /**
     * @param $gy
     * @param $gm
     * @param $gd
     * @param string $mod
     * @return array|string
     */
    public function gregorian_to_jalali($gy, $gm, $gd, $mod = '')
    {
        $g_d_m = array(0, 31, 59, 90, 120, 151, 181, 212, 243, 273, 304, 334);
        if ($gy > 1600) {
            $jy = 979;
            $gy -= 1600;
        } else {
            $jy = 0;
            $gy -= 621;
        }
        $gy2 = ($gm > 2) ? ($gy + 1) : $gy;
        $days = (365 * $gy) + ((int)(($gy2 + 3) / 4)) - ((int)(($gy2 + 99) / 100)) + ((int)(($gy2 + 399) / 400)) - 80 + $gd + $g_d_m[$gm - 1];
        $jy += 33 * ((int)($days / 12053));
        $days %= 12053;
        $jy += 4 * ((int)($days / 1461));
        $days %= 1461;
        if ($days > 365) {
            $jy += (int)(($days - 1) / 365);
            $days = ($days - 1) % 365;
        }
        $jm = ($days < 186) ? 1 + (int)($days / 31) : 7 + (int)(($days - 186) / 30);
        $jd = 1 + (($days < 186) ? ($days % 31) : (($days - 186) % 30));
        return ($mod == '') ? array($jy, $jm, $jd) : $jy . $mod . $jm . $mod . $jd;
    }

    /**
     * @param $jy
     * @param $jm
     * @param $jd
     * @param string $mod
     * @return array|string
     */
    public function jalali_to_gregorian($jy, $jm, $jd, $mod = '')
    {
        if ($jy > 979) {
            $gy = 1600;
            $jy -= 979;
        } else {
            $gy = 621;
        }
        $days = (365 * $jy) + (((int)($jy / 33)) * 8) + ((int)((($jy % 33) + 3) / 4)) + 78 + $jd + (($jm < 7) ? ($jm - 1) * 31 : (($jm - 7) * 30) + 186);
        $gy += 400 * ((int)($days / 146097));
        $days %= 146097;
        if ($days > 36524) {
            $gy += 100 * ((int)(--$days / 36524));
            $days %= 36524;
            if ($days >= 365) $days++;
        }
        $gy += 4 * ((int)($days / 1461));
        $days %= 1461;
        if ($days > 365) {
            $gy += (int)(($days - 1) / 365);
            $days = ($days - 1) % 365;
        }
        $gd = $days + 1;
        foreach (array(0, 31, (($gy % 4 == 0 and $gy % 100 != 0) or ($gy % 400 == 0)) ? 29 : 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31) as $gm => $v) {
            if ($gd <= $v) break;
            $gd -= $v;
        }
        return ($mod == '') ? array($gy, $gm, $gd) : $gy . $mod . $gm . $mod . $gd;
    }
}
