<?php

namespace app\models\qdata;

use app\models\IQData;

class Qdata_1_3 implements IQData
{
    static public function data()
    {
        $rules = [
            'hint1'    => 'Вечный друг Геральда',
            'hint2'    => 'Подсказка 2',
            'question' => 'Кем является лютик?',
            'answer'   => [
                'type'     => 'choice',
                'variants' => ['Поэт', 'Бард', 'Наемник', 'Король Ривии',],
                'right_answer' => ['Поэт', 'Бард',],
            ]

        ];
        return $rules;
    }
}