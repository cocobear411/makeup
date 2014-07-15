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

/**
 * Site controller
 */
class SiteController extends Controller
{
    public function actionIndex()
    {
        $picture['upLeft'] = Picture::findOne(['tag' => '上左']);
        $picture['upRight'] = Picture::findOne(['tag' => '上右']);
        $picture['middle'] = Picture::findOne(['tag' => '中']);
        $picture['downLeft'] = Picture::findOne(['tag' => '下左']);
        $picture['downMiddel'] = Picture::findOne(['tag' => '下中']);
        $picture['downRight'] = Picture::findOne(['tag' => '下右']);
        
        return $this->render('index', ['picture' => $picture]);
    }
    
    public function actionCompany()
    {
        echo "Company";
    }
    
    public function actionProduct()
    {
        echo "Product";
    }
    
    public function actionArticle()
    {
        echo "Article";
    }
    
    public function actionAgency()
    {
        echo "Agency";
    }
}
