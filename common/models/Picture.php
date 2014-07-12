<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "picture".
 *
 * @property integer $id
 * @property string $tag
 * @property integer $image
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
            [['tag', 'image', 'create_time', 'update_time'], 'required'],
            [['image'], 'integer'],
            [['create_time', 'update_time'], 'safe'],
            [['tag'], 'string', 'max' => 32]
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
            'image' => 'Image',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
        ];
    }
}
