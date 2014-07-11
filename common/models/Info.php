<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "info".
 *
 * @property string $id
 * @property string $tag
 * @property string $value
 * @property string $create_time
 * @property string $update_time
 */
class Info extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tag', 'value', 'create_time', 'update_time'], 'required'],
            [['create_time', 'update_time'], 'safe'],
            [['tag', 'value'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tag' => 'Tag',
            'value' => 'Value',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
        ];
    }
}
