<?php

namespace common\models;

use Yii;
use yii\imagine\Image;

/**
 * This is the model class for table "agency".
 *
 * @property integer $id
 * @property string $code
 * @property string $image
 * @property string $create_time
 * @property string $update_time
 */
class Agency extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'agency';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code', 'create_time', 'update_time'], 'required'],
            [['create_time', 'update_time'], 'safe'],
            [['code'], 'string', 'max' => 32],
            [['image'], 'string', 'max' => 225],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'          => '代理信息ID',
            'code'        => '证书编号',
            'image'       => '证书图片',
            'create_time' => '创建时间',
            'update_time' => '更新时间',
        ];
    }

    public static function saveImage($imageUploadInstance)
    {
        if ($imageUploadInstance == null)
        {
            return null;
        }
        $imageFileExt = strtolower($imageUploadInstance->getExtension());
        $save_path    = Yii::$app->getBasePath() . "/../upload/";
        if (!file_exists($save_path))
        {
            mkdir($save_path, 0777, true);
        }
        $ymd = date("Ymd");
        $save_path .= $ymd . '/';
        if (!file_exists($save_path))
        {
            mkdir($save_path, 0777, true);
        }
        $img_prefix    = date("YmdHis") . '_' . rand(10000, 99999);
        $imageFileName = $img_prefix . '.' . $imageFileExt;
        $save_path .= $imageFileName;

        $imageUploadInstance->saveAs($save_path);

//        Image::thumbnail($save_path, $width, $height)->save($save_path);

        return $ymd . '/' . $imageFileName;
    }

}
