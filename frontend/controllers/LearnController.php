<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use common\models\Category;
use common\models\Course;
use common\models\Chapter;
use common\models\Lesson;
use yii\web\NotFoundHttpException;

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
        $course_model = new Course();
        $course = $course_model->find()->where(['slug' => $course_slug])->one();
        
        if(isset($course)) {
            $course_id = $course->id;
        } else {
            throw new NotFoundHttpException("Such course doesnt exist in our system.");
        }

        $chapter_model = new Chapter();
        $chapter = $chapter_model->find()->where(['course_id' => $course_id, 'slug' => $chapter_slug])->one();

        if(isset($chapter)) {
            $chapter_id = $chapter->id;
        } else {
            throw new NotFoundHttpException("Chapter with a given URL doesnt exist.");
        }


        $lesson = new Lesson();
        $lessons = $lesson->find()->where(['chapter_id' => $chapter_id])->all();

        return $this->render('chapter', ['lessons' => $lessons]);
    }

    public function actionLesson($course_slug, $chapter_slug, $lesson_slug) {
        
        $course_model = new Course();
        $course = $course_model->find()->where(['slug' => $course_slug])->one();
        
        if(isset($course)) {
            $course_id = $course->id;
        } else {
            throw new NotFoundHttpException("Such course doesnt exist in our system.");
        }

        $chapter_model = new Chapter();
        $chapter = $chapter_model->find()->where(['course_id' => $course_id, 'slug' => $chapter_slug])->one();

        if(isset($chapter)) {
            $chapter_id = $chapter->id;
        } else {
            throw new NotFoundHttpException("Chapter with a given URL doesnt exist.");
        }
        
        $lesson_model = new Lesson();
        $lesson = $lesson_model->find()->where(['chapter_id' => $chapter_id, 'slug' => $lesson_slug])->one();

        return $this->render('lesson', ['lesson' => $lesson]);

    }

    public function authorizePath($course_slug, $chapter_slug) {
        
    }
}