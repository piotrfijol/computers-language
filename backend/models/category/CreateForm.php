<?php

namespace backend\models\category;

use yii;
use yii\base\Model;

class CreateForm extends Model {

    public $id;
    public $name;
    

    public function rules() {
        return [
            [['name'], 'trim'],

            ['name', 'required'],
            ['name', 'unique', 'targetClass' => \common\models\Category::class, 'message' => 'Kategoria o tej nazwie już istnieje.'],
            ['name', 'string', 'max' => 128, 'message' => 'Nazwa kategorii może składać się z maksymalnie 128 znaków.'],

        ];
    }

    public function create() {
        if(!$this->validate()) {
            return;
        }

        if(!isset($this->id))
            $category = new \common\models\Category();
        else
            $category = \common\models\Category::find()->where(['id' => $this->id])->one();

        $category->name = $this->name;

        return $category->save();
    }

}