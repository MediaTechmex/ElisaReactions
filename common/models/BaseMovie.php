<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%movie}}".
 *
 * @property integer $id
 * @property string $name
 * @property integer $length
 * @property string $picture_url
 * @property string $stream_url
 * @property string $description
 *
 * @property Reaction[] $reactions
 */
class BaseMovie extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%movie}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'length', 'picture_url', 'stream_url', 'description'], 'required'],
            [['length'], 'integer'],
            [['name', 'picture_url', 'stream_url', 'description'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'length' => 'Length',
            'picture_url' => 'Picture Url',
            'stream_url' => 'Stream Url',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReactions()
    {
        return $this->hasMany(Reaction::className(), ['movie_id' => 'id']);
    }
}
