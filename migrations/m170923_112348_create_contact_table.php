<?php

use yii\db\Migration;

/**
 * Handles the creation of table `contact`.
 */
class m170923_112348_create_contact_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('contact', [
            'id' => $this->primaryKey(),
            'name'=> 'varchar NOT NULL',
            'email'=> 'varchar NOT NULL',
            'message'=> 'varchar NOT NULL',

        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('contact');
    }
}
