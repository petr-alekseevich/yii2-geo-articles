<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "like".
 *
 * @property int $id
 * @property int|null $article_id id статьи
 * @property int|null $user_id id пользователя
 */
class Like extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'like';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['article_id', 'user_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'article_id' => 'id статьи',
            'user_id' => 'id пользователя',
        ];
    }
}
