<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%article}}`.
 */
class m230402_180838_add_video_column_to_article_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%article}}', 'video', $this->text());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%article}}', 'video');
    }
}
