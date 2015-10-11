<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;

class BaseController extends Controller
{

    public function __construct($id, $module)
    {
        parent::__construct($id, $module);
            if (Yii::$app->user->isGuest) {
                return $this->redirect('/site/login', 302);

            }
        else {
            return false;
        }
    }
}
