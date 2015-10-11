<?php

namespace app\models\qdata;

use app\models\IQData;

class Qdata_1_4 implements IQData
{
    static public function data()
    {
        $rules = [
            'hint1'    => 'Подсказка 1',
            'hint2'    => 'Подсказка 2',
            'question' => 'Вопрос номер 4',
            'answer'   => [
                'type'  => 'text',
                'right_answer' => ['1'],
            ]

        ];
        return $rules;
    }
}