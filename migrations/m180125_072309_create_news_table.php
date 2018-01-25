<?php

use yii\db\Migration;

/**
 * Handles the creation of table `news`.
 */
class m180125_072309_create_news_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('news', [
            'id' => $this->primaryKey(),
            'title' => $this->string(30)->notNull(),
            'alias' => $this->string(30)->notNull(),
            'short_text' => $this->string()->notNull(),
            'full_text' => $this->text()->notNull(),
            'category_id' => $this->integer(),
            'tags' => $this->text(),
        ]);

        $this->createIndex(
            'idx-news-category_id',
            'news',
            'category_id'
        );

        // add foreign key for table `category`
        $this->addForeignKey(
            'fk-news-category_id',
            'news',
            'category_id',
            'category',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('news');
    }
}
