<?php

use yii\db\Schema;
use yii\db\Migration;

class m151222_092536_eauth extends Migration
{
    public function up()
    {
        $this->addColumn('user', 'eauth_id', $this->string());
        $this->addColumn('user', 'eauth_service', $this->string());
    }

    public function down()
    {
        $this->dropColumn('user', 'eauth_id');
        $this->dropColumn('user', 'eauth_service');
    }
}
