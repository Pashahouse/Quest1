<?php

namespace app\models\qdata;

use app\models\IQData;

class Qdata_2_2 implements IQData
{
    static public function data()
    {
        $rules = [
            'hint1'    => '',
            'hint2'    => '',
            'question' => 'Как зовут BadComedian?',
            'answer'   => [
                'type'     => 'choice',
                'variants' => ['Евгений Баженов', 'Иван Дуров', 'Павел Дуров', 'Элиот Рид'],
                'right_answer' => ['Евгений Баженов'],
            ]

        ];
        return $rules;
    }
}