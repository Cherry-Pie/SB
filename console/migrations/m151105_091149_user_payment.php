<?php

use yii\db\Schema;
use yii\db\Migration;

class m151105_091149_user_payment extends Migration
{
	public function up()
	{
		$this->addColumn('user', 'plan', $this->integer()->defaultValue(0));
	}

	public function down()
	{
		$this->dropColumn('user', 'plan');
	}
}
