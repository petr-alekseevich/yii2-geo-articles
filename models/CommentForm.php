<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * CommentForm is the model behind the contact form.
 */
class CommentForm extends Model
{
    public $comment;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['comment'], 'required'],
            [['comment'], 'string', 'length' => [3,250]],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'comment' => 'Комментарий',
        ];
    }

    public function saveComment($article_id): bool
    {
        $comment = new Comment;

        $comment->text = $this->comment;
        $comment->user_id = Yii::$app->user->id;
        $comment->article_id = $article_id;
        $comment->status = 0;
        $comment->date = date('Y-m-d H:i:s');

        return $comment->save();
    }
}