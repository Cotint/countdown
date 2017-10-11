<?php

use yii\db\Migration;

/**
 * Handles the creation of table `info`.
 */
class m170923_112320_create_info_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('tbl_info', [
            'id' => $this->primaryKey(),
            'about'=> $this->string()->notNull(),
            'facebook'=> $this->string(),
            'instagram'=> $this->string(),
            'twitter'=> $this->string(),
            'telegram'=> $this->string(),
            'address'=> $this->string(),
            'logo'=> $this->string(),
            'email'=> $this->string(),
            'phone'=> $this->string(),
            'time'=> $this->datetime(),

        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('tbl_info');
    }
}
