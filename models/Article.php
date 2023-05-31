<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

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
 * @property string|null $video
 * @property ArticleTag[] $articleTags
 * @property Comment[] $comments
 * @property Category $category Категория
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
            [['title'], 'required'],
            [['description', 'content', 'video'], 'string'],
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
            'video' => 'Видео',
        ];
    }

    public function saveArticle()
    {
        //dd(Yii::$app->request->post());
        $this->user_id = Yii::$app->user->id;
        $this->date = Yii::$app->formatter->asDate($this->date, 'php:Y-m-d');
        $this->category_id = 1;
        return $this->save(false);
    }

    public function getTags()
    {
        return $this->hasMany(Tag::class, ['id' => 'tag_id'])
            ->viaTable('article_tag', ['article_id' => 'id']);
    }

    public function getSelectedTags()
    {
        $selectedTags = $this->getTags()->select('id')->asArray()->all();
        return ArrayHelper::getColumn($selectedTags, 'id');
    }

    public function saveTags($tags)
    {
        if (is_array($tags)){
            $this->clearCurrentTags();
            foreach ($tags as $tag_id){
                $tag = Tag::findOne($tag_id);
                $this->link('tags', $tag);
            }
        }
    }

    public function clearCurrentTags()
    {
        ArticleTag::deleteAll(['article_id'=>$this->id]);
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

    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }

    /**
     * @param $category_id
     * @return true|void
     */
    public function saveCategory($category_id)
    {
        $category = Category::findOne($category_id);
        if($category != null){
            $this->link('category', $category);
            return true;
        }
    }

    public function saveImage($filename)
    {
        $this->image = $filename;
        $this->save(false);
    }

    public function getImage()
    {
        return ($this->image) ? '/uploads/titleImage/' . $this->image : '/no-image.png';
    }

    public static function randomArticle()
    {
        $articles = Article::find()->select('id')->asArray()->all();
        $randomKey = array_rand(ArrayHelper::getColumn($articles, 'id'));

        return self::findOne($articles[$randomKey]);
    }

    public static function getPopular()
    {
        return Article::find()->orderBy('viewed desc')->limit(3)->all();
    }

    public static function getRecent()
    {
        return Article::find()->orderBy('date desc')->limit(4)->all();
    }

    public function getDate()
    {
        return Yii::$app->formatter->asDate($this->date);
    }
}
