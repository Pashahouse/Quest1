<?php

namespace app\models\qdata;

use app\models\IQData;

class Qdata_2_1 implements IQData
{
    static public function data()
    {
        $rules = [
            'hint1'    => 'Тут были зомби',
            'hint2'    => 'Девушку зовут Эли',
            'question' => '<p>Что это за игра?</p><img width="256px" src="http://itc.ua/wp-content/uploads/2015/03/TLOU_WinterCoverRender_960p.jpg">',
            'answer'   => [
                'type'     => 'choice',
                'variants' => ['Gta V', 'Witcher 3', 'Angry birds', 'Last of Us'],
                'right_answer' => ['Last of Us'],
            ]

        ];
        return $rules;
    }
}