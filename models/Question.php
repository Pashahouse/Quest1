<?php

namespace app\models;

class Question extends \yii\base\Object
{
    public $id;
    public $stage_id;
    public $hint1;
    public $hint2;
    public $hint_access;
    public $answer;
    public $question;

    public function __construct(User $user)
    {
        parent::__construct();
        $this->load_question($user->last_stage, $user->last_question);
        $this->hint_access = \Yii::$app->session->get('hint');

    }

    protected function load_question($stage, $question)
    {
        $this->id = $question;
        $this->stage_id = $stage;
        $class = '\app\models\qdata\qdata_' . $this->stage_id . '_' . $this->id;
        $qdata = $class::data();
        $this->hint1 = $qdata['hint1'];
        $this->hint2 = $qdata['hint2'];
        $this->answer = $qdata['answer']['right_answer'];
        $this->question = $qdata['question'];

    }

    public function check_answer($answer)
    {
        $answer = str_replace(' ','',mb_strtolower(trim($answer)));

        if (in_array($answer, $this->answer)) {
            return true;
        }
    }

    public function give_hint()
    {
        $hint = \Yii::$app->session->get('hint');
        if ($hint < 2) {
            $hint++;
            $this->hint_access++;
        }
        \Yii::$app->session->set('hint', $hint);
    }

    public function flush_hint()
    {
        $this->hint_access = 0;
        \Yii::$app->session->remove('hint');
    }
}
