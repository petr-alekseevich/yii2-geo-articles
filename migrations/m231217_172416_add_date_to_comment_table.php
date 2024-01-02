<?php

use yii\db\Migration;

/**
 * Class m231217_172416_add_date_to_comment_table
 */
class m231217_172416_add_date_to_comment_table extends Migration
{
    public function safeUp()
    {
        $this->addColumn('comment','date', $this->dateTime());
    }


    public function safeDown()
    {

        $this->dropColumn('comment','date');
    }
}
