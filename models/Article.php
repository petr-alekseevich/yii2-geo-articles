<?php

namespace app\models;

use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "article".
 *
 * @property int $id
 * @property string|null $title Название статьи
 * @property string|null $description Краткое описание
 * @property string|null $content Содержание
 * @property string|null $date Дата создания
 * @property string|null $image Картинка
 * @property int|null $viewed Количество просмотров
 * @property int|null $user_id Пользователь
 * @property int|null $status Опубликован
 * @property int|null $category_id Категория
 *
 * @property ArticleTag[] $articleTags
 * @property Comment[] $comments
 */
class Article extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['description', 'content'], 'string'],
            [['date'], 'safe'],
            [['viewed', 'user_id', 'status', 'category_id'], 'integer'],
            [['title', 'image'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'title' => 'Название статьи',
            'description' => 'Краткое описание',
            'content' => 'Содержание',
            'date' => 'Дата создания',
            'image' => 'Картинка',
            'viewed' => 'Количество просмотров',
            'user_id' => 'Пользователь',
            'status' => 'Опубликован',
            'category_id' => 'Категория',
        ];
    }

    /**
     * Gets query for [[ArticleTags]].
     *
     * @return ActiveQuery
     */
    public function getArticleTags(): ActiveQuery
    {
        return $this->hasMany(ArticleTag::class, ['article_id' => 'id']);
    }

    /**
     * Gets query for [[Comments]].
     *
     * @return ActiveQuery
     */
    public function getComments(): ActiveQuery
    {
        return $this->hasMany(Comment::class, ['article_id' => 'id']);
    }
}
