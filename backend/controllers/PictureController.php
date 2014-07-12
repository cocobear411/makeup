<?php

namespace backend\controllers;

use Yii;
use common\models\Picture;
use common\models\search\PictureSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use common\models\Agency;

/**
 * PictureController implements the CRUD actions for Picture model.
 */
class PictureController extends Controller
{

    public function behaviors()
    {
        return [
            'verbs' => [
                'class'   => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Picture models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel  = new PictureSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                'searchModel'  => $searchModel,
                'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Picture model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
                'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Picture model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Picture();

//        var_dump(Yii::$app->request->post());
//        exit;

        if ($model->load(Yii::$app->request->post()))
        {
            $imageUploadFile = UploadedFile::getInstance($model, 'image');

            if ($imageUploadFile !== null && $imageUploadFile->tempName != null)
            {
                $model->image = Agency::saveImage($imageUploadFile, 565, 800);

                if ($model->save())
                {
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
            else
            {
                $model->addError('image', "请上传图片");
            }
        }

        if (Yii::$app->request->isPost)
        {
            
        }

        return $this->render('create', [
                'model' => $model,
        ]);
    }

    /**
     * Updates an existing Picture model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if (\Yii::$app->request->isPost)
        {
            $imageUploadFile = UploadedFile::getInstance($model, 'image');

            if ($imageUploadFile !== null && $imageUploadFile->tempName != null)
            {
                $model->image = Agency::saveImage($imageUploadFile, 565, 800);
            }
            else
            {
                $model->image = $oldImage;
            }

            if ($model->save())
            {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('update', [
                'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Picture model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Picture model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Picture the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Picture::findOne($id)) !== null)
        {
            return $model;
        }
        else
        {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
