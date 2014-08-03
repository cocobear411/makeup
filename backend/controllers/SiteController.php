<?php

namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use common\models\LoginForm;
use yii\filters\VerbFilter;
use common\models\ChangePasswordForm;
use bamboo\ueditor\UFunction;

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
                'rules' => [
                    [
                        'actions' => ['login', 'error', 'uploadimg', 'backimg', 'scrawup', 'getmovie', 'remoteimage', 'fileup', ],
                        'allow'   => true,
                    ],
                    [
                        'actions' => ['logout', 'index', 'change-password', 'uploadimg', 'backimg', 'scrawup', 'getmovie', 'remoteimage', 'fileup', 'test'],
                        'allow'   => true,
                        'roles'   => ['@'],
                    ],
                ],
            ],
            'verbs'  => [
                'class'   => VerbFilter::className(),
                'actions' => [
                    'logout'      => ['post'],
                    'uploadimg' => ['post'],
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
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest)
        {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login())
        {
            return $this->goBack();
        }
        else
        {
            return $this->render('login', [
                    'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionChangePassword()
    {
        if (\Yii::$app->user->isGuest)
        {
            $model = new LoginForm();
            return $this->render('login', ['model' => $model]);
        }

        $model = new ChangePasswordForm();
        if ($model->load(\Yii::$app->request->post()) && $model->changePassword())
        {
            return $this->actionLogout();
        }
        else
        {
            return $this->render('change_password', ['model' => $model]);
        }
    }

    /**
     * Ueditor 附件上传
     */
    public function actionFileup()
    {
        UFunction::FileUpload('file');
        exit;
    }

    /**
     * UEditor远程图片抓取
     */
    public function actionRemoteimage()
    {
        UFunction::getRemoteImage($uri, $config);
        exit;
    }

    /**
     * UEditor 获取视频列表
     */
    public function actionGetmovie()
    {
        UFunction::GetMovie();
        exit;
    }

    /**
     * UEditor 涂鸦板
     */
    public function actionScrawup()
    {
        UFunction::scrawUp();
        exit;
    }

    /**
     * Ueditor 获取图片列表
     */
    public function actionBackimg()
    {
        UFunction::backList();
        exit;
    }

    /**
     * 图片上传方法
     */
    public function actionUploadimg()
    {
        UFunction::FileUpload();
    }

    public function actionTest()
    {
        echo Yii::$app->request->baseUrl;
        echo "<br/>";
        echo Yii::$app->urlManager->createUrl('/site/uploadimg');
    }

}
