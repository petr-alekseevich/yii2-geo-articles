<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%article}}`.
 */
class m230319_195652_create_article_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%article}}', [
            'id' => $this->primaryKey(),
            'title'=>$this->string()->comment('Название статьи'),
            'description'=>$this->text()->comment('Краткое описание'),
            'content'=>$this->text()->comment('Содержание'),
            'date'=>$this->datetime()->comment('Дата создания'),
            'image'=>$this->string()->comment('Картинка'),
            'viewed'=>$this->integer()->comment('Количество просмотров'),
            'user_id'=>$this->integer()->comment('Пользователь'),
            'status'=>$this->boolean()->defaultValue(0)->comment('Опубликован'),
            'category_id'=>$this->integer()->comment('Категория'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%article}}');
    }
}
