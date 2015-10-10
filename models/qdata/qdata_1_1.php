<?php

namespace app\models\qdata;

use app\models\IQData;

class Qdata_1_1 implements IQData
{
    static public function data()
    {
        $rules = [
            'hint1'    => 'Подсказка 1',
            'hint2'    => 'Подсказка 2',
            'question' => 'Вопрос номер 1',
            'answer'   => [
                'answer_type'  => 'text',
                'right_answer' => ['ответ1'],
            ]

        ];
        return $rules;
    }
}