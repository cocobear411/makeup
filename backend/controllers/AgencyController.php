<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use common\models\Agency;
use common\models\search\AgencySearch;
use yii\web\UploadedFile;

/**
 * Agency controller
 */
class AgencyController extends Controller
{

    public function actionIndex()
    {
        $searchModel  = new AgencySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('index', [
                'dataProvider' => $dataProvider,
                'searchModel'  => $searchModel,
        ]);
    }

    public function actionCreate()
    {
        $model = new Agency();

        if (Yii::$app->request->isPost)
        {
            $model->load(Yii::$app->request->post());

            var_dump(Yii::$app->request->post());

            $imageUploadFile = UploadedFile::getInstance($model, 'image');


            if ($imageUploadFile !== null && $imageUploadFile->tempName != null)
            {
                $model->image = Agency::saveImage($imageUploadFile, 565, 800);
//                var_dump($model->image);
            }

            $model->create_time = date('Y-m-d H:i:s');
            $model->update_time = date('Y-m-d H:i:s');

            if ($model->save())
            {
                $this->redirect('index.php?r=agency/index');
            }
            else
            {
                throw new \yii\web\HttpException("400", "图片保存失败");
            }
        }

        return $this->render('create', [
                'model' => $model
        ]);
    }

    public function actionView($id)
    {
        $model = Agency::findOne($id);

        return $this->render('view', [
                'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = Agency::findOne($id);

        return $this->render('update', [
				'model' => $model
		]);
    }

    public function actionDelete($id)
    {
        $model = Agency::findOne($id);
        if ($model)
        {
            $image     = $model->image;
            $imagePath = Yii::$app->getBasePath() . "/../upload/" . $image;

            if ($model->delete())
            {
                @unlink($imagePath);

                $this->redirect('index.php?r=agency/index');
            }
        }

        throw new \yii\web\HttpException("400", "Delete fail");
    }

}
