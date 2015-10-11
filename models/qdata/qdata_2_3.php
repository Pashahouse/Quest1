<?php

namespace app\models\qdata;

use app\models\IQData;

class Qdata_2_3 implements IQData
{
    static public function data()
    {
        $rules = [
            'hint1'    => 'Подсказка 1',
            'hint2'    => 'Подсказка 2',
            'question' => 'Для какой компании я делал этот сайт',
            'answer'   => [
                'type'     => 'choice',
                'variants' => ['ArmoCrm', 'Vkontakte', 'Flying Colors', 'Фонд Иследований Новые Медиа'],
                'right_answer' => [ 'Flying Colors', ],
            ]

        ];
        return $rules;
    }
}