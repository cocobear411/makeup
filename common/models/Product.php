<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property string $id
 * @property string $type
 * @property string $name
 * @property string $image
 * @property string $create_time
 * @property string $update_time
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'name', 'create_time', 'update_time'], 'required'],
            [['create_time', 'update_time'], 'safe'],
            [['type', 'name'], 'string', 'max' => 32],
            [['image'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '产品信息ID',
            'type' => '类型',
            'name' => '名称',
            'image' => '图片',
            'create_time' => '创建时间',
            'update_time' => '更新时间',
        ];
    }
}
