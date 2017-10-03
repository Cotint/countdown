<?php

use yii\db\Migration;

/**
 * Handles adding token to table `user`.
 */
class m170927_125013_add_token_column_to_user_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('user', 'token', $this->string());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('user', 'token');
    }
}
