<?php

namespace app\models\base;

use Yii;

/**
 * This is the model class for table "links".
 *
 * @property int $id
 * @property string|null $original
 * @property string|null $short
 */
class Links extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'links';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['original', 'short'], 'string', 'max' => 255],
            [['original'], 'url']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'original' => 'Original',
            'short' => 'Short',
        ];
    }
}