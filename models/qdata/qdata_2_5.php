<?php

namespace app\models\qdata;

use app\models\IQData;

class Qdata_2_5 implements IQData
{
    static public function data()
    {
        $rules = [
            'hint1'    => 'Его имя как у бога молний',
            'hint2'    => 'Его отец владыка Асгарда',
            'question' => 'Как зовут человека,который мог бы это сверстать?',
            'answer'   => [
                'type'         => 'text',
                'right_answer' => ['тор', 'торгом', 'торик'],
            ]
        ];
        return $rules;
    }
}