<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property string $title
 * @property string $alias
 * @property string $short_text
 * @property string $full_text
 * @property int $category_id
 * @property string $tags
 *
 * @property Category $category
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'alias', 'short_text', 'full_text'], 'required'],
            [['full_text', 'tags'], 'string'],
            [['category_id'], 'integer'],
            [['title', 'alias'], 'string', 'max' => 30],
            [['short_text'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'alias' => 'Alias',
            'short_text' => 'Short Text',
            'full_text' => 'Full Text',
            'category_id' => 'Category ID',
            'tags' => 'Tags',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }
}
