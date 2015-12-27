<?php

use yii\db\Schema;
use yii\db\Migration;

class m151227_141007_27122015 extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%games}}', [
            'id' => $this->primaryKey(),
            'group_id' => $this->float()->notNull()->defaultValue(0),
            'name' => $this->string()->notNull()->unique(),
            'cost' => $this->float()->notNull()->defaultValue(0),
            'created_at' => $this->datetime()->notNull(),
            'updated_at' => $this->datetime()->notNull(),
        ], $tableOptions);

        $this->createTable('{{%groups}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->unique(),
            'created_at' => $this->datetime()->notNull(),
            'updated_at' => $this->datetime()->notNull(),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%games}}');
        $this->dropTable('{{%groups}}');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
