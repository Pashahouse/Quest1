<?php

namespace app\models\qdata;

use app\models\IQData;

class Qdata_1_1 implements IQData
{
    static public function data()
    {
        $rules = [
            'hint1'    => 'Название похоже на рыбу',
            'hint2'    => 'Она не единорог',
            'question' => 'Как звали лошадь Геральда?',
            'answer'   => [
                'type'     => 'choice',
                'variants' => ['Плотва', 'Семга', 'Лопстер', 'Хавчик','Единорог'],
                'right_answer' => ['Плотва'],
            ]

        ];
        return $rules;
    }
}