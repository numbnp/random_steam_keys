<?php

use yii\db\Schema;
use yii\db\Migration;

class m151230_112225_30122015 extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%keys}}', [
            'id' => $this->primaryKey(),
            'game_id' => $this->integer()->notNull(),
            'key' => $this->string()->notNull()->unique(),
            'cost' => $this->float()->notNull()->defaultValue(0),
            'created_at' => $this->datetime()->notNull(),
            'updated_at' => $this->datetime()->notNull(),
            'sales' => $this->integer()->notNull()->defaultValue(0),
        ], $tableOptions);

        $this->createIndex('game_id_index','{{%keys}}','game_id');
        $this->addForeignKey('keys_games','{{%keys}}','game_id','{{%games}}','id','CASCADE');
    }

    public function down()
    {
        $this->dropTable('{{%keys}}');
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
