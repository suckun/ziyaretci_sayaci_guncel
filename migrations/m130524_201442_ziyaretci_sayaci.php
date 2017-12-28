<?php

use yii\db\Schema;
use yii\db\Migration;

class m130524_201442_ziyaretci_sayaci extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%ziyaretci_sayacis}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(200)->notNull(),
			'description' => $this->text()->notNull(),
            'picture' => $this->text(),
        ], $tableOptions);

        $this->createTable('{{%ziyaretci_sayaci}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'ziyaretci_sayaci_id' => $this->integer(11)->notNull(),
        ], $tableOptions);

        $this->createIndex(
            'idx_ziyaretci_sayaci_data_ziyaretci_sayaci_id-1',
            'ziyaretci_sayaci_data',
            'ziyaretci_sayaci_id'
        );

        $this->addForeignKey(
          'fk_ziyaretci_sayaci_data_ziyaretci_sayaci_id-1',
          'ziyaretci_sayaci_data',
          'ziyaretci_sayaci_id',
          'ziyaretci_sayacis',
          'id'
        );

    }

    public function down()
    {
        $this->dropForeignKey('fk_ziyaretci_sayaci_data_ziyaretci_sayaci_id-1','ziyaretci_sayaci_data');
        $this->dropIndex('idx_ziyaretci_sayaci_data_ziyaretci_sayaci_id-1','ziyaretci_sayaci_data');
        $this->dropTable('{{%ziyaretci_sayaci_data}}');
        $this->dropTable('{{%ziyaretci_sayacis}}');
    }
}
