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
        $this->createTable('info', [
            'id' => $this->primaryKey(),
            'about'=> 'varchar  NOT NULL',
            'facebook'=> 'varchar' ,
            'instagram'=> 'varchar' ,
            'twitter'=> 'varchar' ,
            'tumblr'=> 'varchar' ,
            'address'=> 'varchar' ,
            'logo'=> 'varchar' ,
            'email'=> 'varchar' ,
            'phone'=> 'varchar' ,
            'time'=> 'datetime'

        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('info');
    }
}
