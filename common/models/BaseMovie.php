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
 * @property integer $program_id
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
            [['name', 'length', 'picture_url', 'program_id', 'description'], 'required'],
            [['length', 'program_id'], 'integer'],
            [['description'], 'string'],
            [['name', 'picture_url'], 'string', 'max' => 255],
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
            'program_id' => 'Program ID',
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
