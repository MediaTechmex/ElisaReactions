<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%movie}}".
 *
 * @property integer $id
 * @property string $name
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
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
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
