<?php
use yii\helpers\Html;
echo Html::beginForm();
echo Html::textInput(
    'answer',
    '',
    ['autocomplete' => 'off', 'placeholder' => 'Ответ' 'class' => '']
);
echo Html::button('Ответить', ['type' => 'submit','required'=>'required', 'class' => 'btn  btn-success']);
echo Html::endForm();
?>