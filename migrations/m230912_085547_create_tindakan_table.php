<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tindakan}}`.
 */
class m230912_085547_create_tindakan_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tindakan}}', [
            'id' => $this->primaryKey(),
            'pasien_id' => $this->integer(),
            'tindakan' => $this->string(255)->notNull(),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
        ]);

        $this->addForeignKey(
            'fk-tindakan-pasien_id',
            'tindakan',
            'pasien_id',
            'pasien',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-tindakan-pasien_id', 'tindakan');
        $this->dropTable('{{%tindakan}}');
    }
}
