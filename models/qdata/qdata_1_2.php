<?php

namespace app\models\qdata;

use app\models\IQData;

class Qdata_1_2 implements IQData
{
    static public function data()
    {
        $rules = [
            'hint1'    => 'Рыженькая или черная',
            'hint2'    => 'Волшебница',
            'question' => 'Трисс или Йеннифер?',
            'answer'   => [
                'type'  => 'text',
                'right_answer' => ['трисс','йенифер','йен','трис'],
            ]

        ];
        return $rules;
    }
}