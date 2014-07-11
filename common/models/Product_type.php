<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product_type".
 *
 * @property string $id
 * @property integer $serial
 * @property string $type
 * @property string $create_time
 * @property string $update_time
 */
class Product_type extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['serial', 'type', 'create_time', 'update_time'], 'required'],
            [['serial'], 'integer'],
            [['create_time', 'update_time'], 'safe'],
            [['type'], 'string', 'max' => 32],
            [['serial'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'serial' => 'Serial',
            'type' => 'Type',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
        ];
    }
}
