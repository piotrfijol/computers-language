<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use common\models\Category;
use common\models\Course;
use common\models\Chapter;
use common\models\Lesson;
use common\models\Test;
use common\models\FinishedLesson;
use yii\web\NotFoundHttpException;

class LearnController extends Controller {

    public function beforeAction($action) {
        if($action->id == 'validate-answers')
            $this->enableCsrfValidation = false;
            
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
            throw new NotFoundHttpException("A course with a given URL doesnt exist.");
        }

        $chapter_model = new Chapter();
        $chapter = $chapter_model->find()->where(['course_id' => $course_id, 'slug' => $chapter_slug])->one();

        if(!isset($chapter)) {
            throw new NotFoundHttpException("Chapter with a given URL doesnt exist.");
        }


        $lessons = $chapter->lessons;

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

        if(Yii::$app->request->getMethod() == "GET") {
            return $this->render('lesson', ['lesson' => $lesson]);
        }

        if(!Yii::$app->user->identity->hasFinishedLesson($lesson->id)) {
            $finished_lesson = new FinishedLesson();
            $finished_lesson->user_id = Yii::$app->user->identity->getId();
            $finished_lesson->lesson_id = $lesson->id;
            $finished_lesson->save();
        }
        
        return $this->redirect("/nauka/{$course_slug}/{$chapter_slug}");
    }

    public function actionTest($course_slug, $chapter_slug) {
        
        $course_model = new Course();
        $course = $course_model->find()->where(['slug' => $course_slug])->one();
        
        if(isset($course)) {
            $course_id = $course->id;
        } else {
            throw new NotFoundHttpException("A course with a given URL doesnt exist.");
        }

        $chapter_model = new Chapter();
        $chapter = $chapter_model->find()->where(['course_id' => $course_id, 'slug' => $chapter_slug])->one();

        if(!isset($chapter)) {
            throw new NotFoundHttpException("Chapter with a given URL doesnt exist.");
        }

        $test_model = new Test();
        $questions = $test_model->find()->where(['chapter_id' => $chapter->id])->one()->questions;

        return $this->render('test', ['questions' => $questions]);

    }

    public function actionValidateAnswers() {
        $args = Yii::$app->request->post();
        $test_id = $args['test_id'];
        $test_model = new Test();
        $questions = $test_model->find()->where(['id' => $test_id])->one()->getQuestions();

        $correct_answers = 0;

        foreach($args['answers'] as $answer) {
            $correct_answer = $questions->where(['id' => $answer['question_id']])->one()->correct_answer;
            if(strcmp($correct_answer, $answer['answer']) == 0) {
                $correct_answers++;
            }
        }

        $response = [
            'testId' => $test_id,
            'correctAnswers' => $correct_answers
        ];
        Yii::$app->response->format = yii\web\Response::FORMAT_JSON;
        return $response;
    }

}