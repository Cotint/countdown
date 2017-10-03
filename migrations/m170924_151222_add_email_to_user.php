<?php

use yii\db\Migration;

class m170924_151222_add_email_to_user extends Migration
{
    public function safeUp()
    {
      $this->addColumn('email', 'status', $this->string());
    }

    public function safeDown()
    {
        echo "m170924_151222_add_email_to_user cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170924_151222_add_email_to_user cannot be reverted.\n";

        return false;
    }
    */
}
