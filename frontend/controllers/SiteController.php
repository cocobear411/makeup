<?php

namespace frontend\controllers;

use Yii;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\Picture;
use common\models\Agency;
use common\models\Info;

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
                'only'  => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow'   => true,
                        'roles'   => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow'   => true,
                        'roles'   => ['@'],
                    ],
                ],
            ],
            'verbs'  => [
                'class'   => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $picture['upLeft']     = Picture::findOne(['tag' => '上左']);
        $picture['upRight']    = Picture::findOne(['tag' => '上右']);
        $picture['middle']     = Picture::findOne(['tag' => '中']);
        $picture['downLeft']   = Picture::findOne(['tag' => '下左']);
        $picture['downMiddel'] = Picture::findOne(['tag' => '下中']);
        $picture['downRight']  = Picture::findOne(['tag' => '下右']);

        return $this->render('index', ['picture' => $picture]);
    }

    public function actionCompany()
    {
        $company = "";
        $model = Info::findOne(['tag' => '公司介绍']);
        if($model)
        {
            $company = $model->value;
        }
        
        return $this->render('company', ['company' => $company]);
    }

    public function actionProduct($id)
    {
        return $this->render('product');
    }

    public function actionArticle()
    {
        return $this->render('article');
    }

    public function actionAgency()
    {
        if (\Yii::$app->request->isPost)
        {
            $image = "";

            $model = Agency::findOne(['code' => \Yii::$app->request->post()['code']]);
            if ($model)
            {
                $image = $model->image;
            }
            else
            {
                echo "<script>alert('代理信息不存在！');</script>";
            }

            return $this->render('agency', ['image' => $image]);
        }

        return $this->render('agency');
    }

}
