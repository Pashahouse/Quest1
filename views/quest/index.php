<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $question app\models\Question */
/* @var $form yii\widgets\ActiveForm */
$this->title = 'Этап' . $question->stage_id . ' вопрос' . $question->id;
?>
<div class="site-index">

    <div class="row">
        <div class="col-md-12 text-center">
            <h2>Этап <?= $question->stage_id ?> Вопрос <?= $question->id ?>/<?= Yii::$app->params['stages'][$question->stage_id] ?></h2>

            <?php if (Yii::$app->session->hasFlash('good_news')): ?>
                <div class="col-lg-12">
                    <div class="alert alert-success" role="alert">
                        <?= Yii::$app->session->getFlash('good_news') ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if (Yii::$app->session->hasFlash('bad_news')): ?>
                <div class="col-lg-12">
                    <div class="alert alert-danger" role="alert">
                        <?= Yii::$app->session->getFlash('bad_news') ?>
                    </div>
                </div>
            <?php endif; ?>

            <p><?= $question->question ?></p>
            <?php if ($question->hint_access > 0 && isset($question->hint1)): ?>
                <p><?= $question->hint1 ?></p>
            <?php endif; ?>
            <?php if ($question->hint_access > 1 && isset($question->hint2)): ?>
                <p> <?= $question->hint2 ?></p>
            <?php endif; ?>


            <?= $this->render('/quest/form_' . $question->answer['type'], ['answer' => $question->answer]); ?>

        </div>
    </div>
</div>
