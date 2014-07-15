<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "picture".
 *
 * @property integer $id
 * @property string $tag
 * @property string $image
 * @property string $create_time
 * @property string $update_time
 */
class Picture extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'picture';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tag', 'create_time', 'update_time'], 'required'],
            [['create_time', 'update_time'], 'safe'],
            [['tag'], 'string', 'max' => 32],
            [['image'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '公司图片ID',
            'tag' => '描述',
            'image' => '图片',
            'create_time' => '创建时间',
            'update_time' => '更新时间',
        ];
    }
}
