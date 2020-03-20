<?php

namespace app\controllers;

use app\models\Like;
use app\models\Mark;
use app\models\Person;
use app\models\PersonRole;
use app\models\Photo;
use app\models\Presentation;
use app\models\Rating;
use app\models\Schedule;
use app\models\ScheduleDate;
use app\models\SchedulePresentation;
use app\models\Section;
use app\models\User;
use Yii;

class FrontController extends \yii\web\Controller
{
    public $layout = '_front';

    public function beforeAction($action)
    {
        // if (Yii::$app->user->isGuest) {
        //     return $this->redirect('/site/login');
        // }
        // // $user_identity = Yii::$app->user->identity;
        // // echo '<pre>';
        // // var_dump($user_identity);die;
        return parent::beforeAction($action);
    }

    public function actionIndex()
    {
        return $this->render('index');
    }
}
