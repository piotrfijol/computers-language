<?php

namespace backend\models\course;

use yii;
use yii\base\Model;

class CreateForm extends Model {

    public $id;
    public $name;
    public $category_id;
    public $img_url;
    

    public function rules() {
        return [
            [['name', 'img_url'], 'trim'],

            ['name', 'required'],
            ['name', 'string', 'max' => 128, 'message' => 'Nazwa kategorii może składać się z maksymalnie 128 znaków.'],

            ['img_url', 'string', 'max' => 255, 'message' => 'URL obrazka jest zbyt długi'],
            
            ['category_id', 'integer'],
            ['category_id', 'required'],            
            ['category_id', 'exist', 'targetClass' => \common\models\Category::class, 'targetAttribute' => 'id'],

        ];
    }

    public function create() {
        if(!$this->validate()) {
            return;
        }

        if(!isset($this->id))
            $course = new \common\models\Course();
        else
            $course = \common\models\Course::find()->where(['id' => $this->id])->one();

        $course->name = $this->name;
        $course->img_url = $this->img_url;
        $course->category_id = $this->category_id;
        $course->slug = \backend\helpers\Utilities::slugify($this->name);

        return $course->save();
    }

}