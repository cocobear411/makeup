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
class ProductType extends \yii\db\ActiveRecord
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
            'id' => '产品类型ID',
            'serial' => '序号',
            'type' => '类型',
            'create_time' => '创建时间',
            'update_time' => '更新时间',
        ];
    }
}
