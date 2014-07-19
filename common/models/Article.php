<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "article".
 *
 * @property string $id
 * @property string $title
 * @property string $content
 * @property string $url
 * @property string $create_time
 * @property string $update_time
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'content', 'create_time', 'update_time'], 'required'],
            [['content'], 'string'],
            [['create_time', 'update_time'], 'safe'],
            [['title', 'url'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '文章ID',
            'title' => '标题',
            'content' => '内容',
            'url' => 'Url',
            'create_time' => '创建时间',
            'update_time' => '更新时间',
        ];
    }
}
