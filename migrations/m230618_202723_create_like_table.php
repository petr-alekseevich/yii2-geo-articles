<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%like}}`.
 */
class m230618_202723_create_like_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%like}}', [
            'id' => $this->primaryKey(),
            'article_id'=>$this->integer()->comment('id статьи'),
            'user_id'=>$this->integer()->comment('id пользователя')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%like}}');
    }
}
