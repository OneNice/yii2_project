<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property string $head
 * @property string $content
 * @property string $date
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['head', 'content', 'date'], 'required'],
            [['content'], 'string'],
            [['date'], 'safe'],
            [['head'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'head' => 'Заголовок',
            'content' => 'Контент',
            'date' => 'Дата',
        ];
    }
}
