<?php

namespace common\components;

use Yii;
use common\models\Course;
use common\models\Chapter;
use common\models\Lesson;
use yii\web\NotFoundHttpException;

class Request extends \yii\web\Request {
    
    /** 
     * Check whether the course specififed in the URL exists or not
     * @return Course|null
     */

    public function getCourse() {
        $course_model = new Course();
        $params = $this->getQueryParams();

        $course = $course_model->find()->where(['slug' => $params['course_slug']])->one();
    
        if($course) {
            return $course;
        } else {
            return throw new NotFoundHttpException("Kurs nie istnieje.");
        }
        
    }

    public function getChapter() {
        $chapter_model = new Chapter();
        $params = $this->getQueryParams();

        $chapter = $chapter_model->find()->where(['slug' => $params['chapter_slug']])->one();

        if($chapter) {
            return $chapter;
        } else {
            return throw new NotFoundHttpException("Rozdział nie istnieje.");
        }
        
    }
    
    public function getLesson() {
        $lesson_model = new Lesson();
        $params = $this->getQueryParams();

        $lesson = $lesson_model->find()->where(['slug' => $params['lesson_slug']])->one();

        if($lesson) {
            return $lesson;
        } else {
            return throw new NotFoundHttpException("Lekcja nie istnieje.");
        }
        
    }

}