<?php

namespace app\controllers;

use app\models\Question;
use Yii;
use yii\web\Controller;


class QuestController extends Controller
{
    public function actionIndex()
    {
        $user = Yii::$app->user->identity;
        $question = new Question($user);
        if (Yii::$app->request->post() AND Yii::$app->request->validateCsrfToken()) {

            $answer = Yii::$app->request->post('answer');
            if ($question->check_answer($answer)) {
                $question->flush_hint();
                $user->last_question++;
                $user->save();

                $question = new Question($user);
            } else {
                $question->give_hint();
                Yii::$app->getSession()->setFlash('bad_news', 'Неправильный ответ');
            }

        }
        return $this->render(
            'index',
            [
                'question' => $question,

            ]
        );
    }
}
