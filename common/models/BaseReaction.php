<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%reaction}}".
 *
 * @property integer $id
 * @property integer $movie_id
 * @property integer $time_stamp
 * @property string $content
 *
 * @property Movie $movie
 */
class BaseReaction extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%reaction}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['movie_id', 'time_stamp', 'content'], 'required'],
            [['movie_id', 'time_stamp'], 'integer'],
            [['content'], 'string', 'max' => 255],
            [['movie_id'], 'exist', 'skipOnError' => true, 'targetClass' => Movie::className(), 'targetAttribute' => ['movie_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'movie_id' => 'Movie ID',
            'time_stamp' => 'Time Stamp',
            'content' => 'Content',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMovie()
    {
        return $this->hasOne(Movie::className(), ['id' => 'movie_id']);
    }
}
