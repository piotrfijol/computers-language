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
use common\models\FinishedChapter;
use yii\web\NotFoundHttpException;

define("TEST_MAX_QUESTIONS", 5);

class LearnController extends Controller {

    public $course = null;
    public $chapter = null;
    public $lesson = null;

    public function beforeAction($action) {
        /* Disable CSRF for RCP call */
        if($action->id == 'validate-answers')
            $this->enableCsrfValidation = false;
          
        /* Authorize client */
        if(Yii::$app->user->isGuest) {
            $this->redirect('/');
            return false;
        }

        $params = Yii::$app->request->getQueryParams();

        if(isset($params['course_slug']))
            $this->course = Yii::$app->request->getCourse();
        
        if(isset($params['chapter_slug']))
            $this->chapter = Yii::$app->request->getChapter();

        if(isset($params['lesson_slug']))
            $this->lesson = Yii::$app->request->getLesson();

        $this->layout = "application";

        // An array of actions that shouldn't be validated
        $valid_actions = ['index'];

        if(array_search($action->id, $valid_actions) === false)
            $this->validatePath();
        
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

    public function actionCourse($course_slug) {

        $chapter_model = new Chapter();
        $chapters = $chapter_model->find()->where(['course_id' => $this->course->id])->all();

        return $this->render('course', ['course' => $this->course, 'chapters' => $chapters]);
    }


    public function actionChapter($course_slug, $chapter_slug) {
        $error_message = '';

        $lessons = $this->chapter->lessons;

        if($this->chapter->isLocked) {
            $error_message = "Wystąpił problem.";

            return $this->render('error', ['errorMessage' => $error_message]);
        }

        return $this->render('chapter', ['lessons' => $lessons]);
    }

    public function actionLesson($course_slug, $chapter_slug, $lesson_slug) {
        $error_message = '';
        
        if($this->chapter->isLocked) {
            $error_message = "Wystąpił problem.";
        }

        if(!strcmp($error_message, "")) {
            return $this->render('error', ['errorMessage' => $error_message]);
        }
        
        if(Yii::$app->request->getMethod() == "GET") {
    
            return $this->render('lesson', ['lesson' => $this->lesson]);
        }

        if(!Yii::$app->user->identity->hasFinishedLesson($this->lesson->id)) {
            $finished_lesson = new FinishedLesson();
            $finished_lesson->user_id = Yii::$app->user->identity->getId();
            $finished_lesson->lesson_id = $this->lesson->id;
            $finished_lesson->save();
        }
        
        return $this->redirect("/nauka/{$course_slug}/{$chapter_slug}");
    }

    public function actionTest($course_slug, $chapter_slug) {
        $error_message = "";

        if($this->chapter->isLocked)
            $error_message = "Wystąpił problem.";

        if(!strcmp($error_message, "")) {
            
            $test = Test::find()->where(['chapter_id' => $this->chapter->id])->one();
            $questions = $test->getQuestions()->asArray()->all();

            shuffle($questions);
            $picked_questions = array_slice($questions, 0, TEST_MAX_QUESTIONS); 
            
            return $this->render('test', ['questions' => $picked_questions]);
        }

        return $this->render('error', ['errorMessage' => $error_message]);


    }

    public function actionValidateAnswers($course_slug, $chapter_slug) {
        $args = Yii::$app->request->post();
        $test_id = $args['test_id'];
        $test_model = new Test();
        $questions = $test_model->find()->where(['id' => $test_id])->one()->getQuestions();

        $correct_answers = 0;

        foreach($args['answers'] as $answer) {
            $correct_answer = $questions->where(['id' => $answer['question_id']])->one()->correct_answer;
            if(isset($answer['answer']) && strcmp($correct_answer, $answer['answer']) == 0) {
                $correct_answers++;
            }
        }

        // Passed
        $is_passed = $correct_answers == TEST_MAX_QUESTIONS;
        if($is_passed) {
            $hasFinished = Yii::$app->user->identity->getFinishedChapters()->where(['id' => $this->chapter->id])->one();
            if($hasFinished == null) {
                $finished_chapter = new FinishedChapter();
                $finished_chapter->user_id = Yii::$app->user->identity->getId();
                $finished_chapter->chapter_id = $this->chapter->id;
                $finished_chapter->save();
            }
        }

        $response = [
            'testId' => $test_id,
            'correctAnswers' => $correct_answers,
            'isPassed' => $is_passed
        ];
        Yii::$app->response->format = yii\web\Response::FORMAT_JSON;
        return $response;
    }

    private function validatePath() {
        if(isset($this->lesson)) {

            if($this->lesson->chapter_id == $this->chapter->id
            && $this->chapter->course_id == $this->course->id)
                return;

        } elseif (isset($this->chapter)) {

            if($this->chapter->course_id == $this->course->id)
                return;

        } elseif (isset($this->course)) {
            return;
        }

        throw new NotFoundHttpException("Resource for a given URL wasnt found.");
    }
}