<?php

use yii\db\Migration;

/**
 * Handles the creation of table `tag`.
 */
class m180125_072300_create_tag_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('tag', [
            'id' => $this->primaryKey(),
            'title' => $this->string(20)->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('tag');
    }
}
