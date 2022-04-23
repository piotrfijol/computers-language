<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use common\models\Category;
use common\models\Course;
use common\models\Chapter;

class LearnController extends Controller {

    public function beforeAction($action) {
        
        if(Yii::$app->user->isGuest) {
            $this->redirect('/');
            return false;
        }
        $this->layout = "application";
        return parent::beforeAction($action);
    }

    public function actionIndex() {
        
        $category_model = new Category();
        $categories = $category_model->find()->all();

        $course_model = new Course();
        $courses = [];

        foreach($categories as $category) {
            $courses[$category->id] = $course_model->find()->where(['category_id' => $category->id])->all();
        }
        
        return $this->render('index', ['categories' => $categories, 'courses' => $courses]);
    }

    public function actionCourse($slug) {

        $course_model = new Course();
        $course = $course_model->find()->where(['slug' => $slug])->one();

        $chapter_model = new Chapter();
        $chapters = $chapter_model->find()->where(['course_id' => $course->id])->all();

        return $this->render('course', ['course' => $course, 'chapters' => $chapters]);
    }


    public function actionChapter($course_slug, $chapter_slug) {
        return $this->render('chapter');
    }
}