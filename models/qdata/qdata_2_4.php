<?php

namespace app\models\qdata;

use app\models\IQData;

class Qdata_2_4 implements IQData
{
    static public function data()
    {
        $rules = [
            'hint1'    => 'Используется движок Yii2',
            'hint2'    => 'Это не руби',
            'question' => 'На каком языке написан этот проект?',
            'answer'   => [
                'type'  => 'text',
                'right_answer' => ['php'],
            ]

        ];
        return $rules;
    }
}