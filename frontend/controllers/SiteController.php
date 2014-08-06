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
use common\models\Product;

/**
 * Site controller
 */
class SiteController extends Controller
{
    public function actionIndex()
    {
        $picture['upLeft']     = Picture::findOne(['tag' => '上左']);
        $picture['upRight']    = Picture::findOne(['tag' => '上右']);
        $picture['middle']     = Picture::findOne(['tag' => '中']);
        $picture['down']   = Picture::findOne(['tag' => '下']);

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

    public function actionProduct($type)
    {
        $products = Product::find()->where(['type' => $type])->orderBy('index')->all();
        return $this->render('product', ['products' => $products]);
    }

    public function actionArticle($id = 0)
    {
        return $this->render('article', ['id' => $id]);
    }

    public function actionAgency()
    {
        if (\Yii::$app->request->isPost)
        {
            $model = Agency::findOne(['code' => \Yii::$app->request->post()['code']]);
            if (!$model)
            {
                echo "<script>alert('代理信息不存在！');</script>";
            }
            
            return $this->render('agency', ['model' => $model]);
        }

        return $this->render('agency');
    }
    
    public function actionError()
    {
        $this->goHome();
    }

}
