<?php

namespace app\models;

use yii\base\Model;

class EntryForm extends Model
{
    public $link;

    public function rules()
    {
        return [
            [['link',], 'required'],
            [['link'], 'url']
        ];
    }
}