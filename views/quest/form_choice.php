<?php
use yii\helpers\Html;
/* @var $answer array */
echo Html::beginForm();

echo Html::radioList('answer',null,$answer['variants']);
echo Html::button('Ответить', ['type' => 'submit', 'class' => 'btn btn-success']);
echo Html::endForm();
?>