<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%pegawai}}`.
 */
class m230912_084859_create_pegawai_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%pegawai}}', [
            'id' => $this->primaryKey(),
            'nama' => $this->string(255)->notNull(),
            'jabatan' => $this->string(255),
            'user_id' => $this->integer(),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
        ]);

        $this->addForeignKey(
            'fk-pegawai-user_id',
            'pegawai',
            'user_id',
            'users',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-pegawai-user_id', 'pegawai');
        $this->dropTable('{{%pegawai}}');
    }
}
