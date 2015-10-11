<?php

namespace app\controllers;

use app\models\Question;
use app\models\User;
use Yii;


class QuestController extends BaseController
{
    public function actionIndex()
    {
        $user = Yii::$app->user->identity;
        if ($user->last_stage == User::TEST_FINISHED) {
            return $this->redirect(['/quest/finished']);
        }
        $question = new Question($user);
        if (Yii::$app->request->post() AND Yii::$app->request->validateCsrfToken()) {
            $answer = Yii::$app->request->post('answer');
            if ($question->check_answer($answer)) {
                $user->nextQuestion($question);

                if ($user->last_stage == User::TEST_FINISHED) {
                    return $this->redirect(['/quest/finished']);
                }

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

    public function actionFinished()
    {
        return $this->render(
            'finished'
        );
    }

    public function actionRestart()
    {
        Yii::$app->user->identity->restartTest();
        return $this->redirect(['/quest']);
    }
}
