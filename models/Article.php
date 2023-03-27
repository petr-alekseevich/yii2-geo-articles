<?php

namespace app\models;

use Yii;

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
class Article extends \yii\db\ActiveRecord
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
    public function rules()
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
    public function attributeLabels()
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

    public function saveArticle()
    {
        $this->user_id = Yii::$app->user->id;
        $this->date = Yii::$app->formatter->asDate($this->date, 'php:Y-m-d');
        $this->category_id = 1;
        return $this->save(false);
    }

    /**
     * Gets query for [[ArticleTags]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getArticleTags()
    {
        return $this->hasMany(ArticleTag::class, ['article_id' => 'id']);
    }

    /**
     * Gets query for [[Comments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::class, ['article_id' => 'id']);
    }
}
