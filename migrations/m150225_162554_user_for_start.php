<?php

use yii\db\Schema;
use yii\db\Migration;

class m150225_162554_user_for_start extends Migration
{
    public function up()
    {
        $this->execute(
            '
INSERT INTO `user` (`id`, `email`, `pswd`,`auth_key`,  `name`, `surname`, `role`, `status`, `created`  )
VALUES(1, "briss@yandex.ru", "' . Yii::$app->getSecurity()->generatePasswordHash('test') . '", "' . Yii::$app->getSecurity()->generateRandomString(). '", "Брисс", "Тор", "user", "active", NOW() )
            '
        );

    }

    public function down()
    {
        $this->execute(
            "
DELETE FROM `user` WHERE `id` >= 1 AND `id` <= 7
            "
        );
    }
}
