<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tagihan}}`.
 */
class m230912_085748_create_tagihan_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tagihan}}', [
            'id' => $this->primaryKey(),
            'pasien_id' => $this->integer(),
            'tindakan_id' => $this->integer(),
            'obat_id' => $this->integer(),
            'jumlah' => $this->decimal(10, 2),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
        ]);

        $this->addForeignKey(
            'fk-tagihan-pasien_id',
            'tagihan',
            'pasien_id',
            'pasien',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-tagihan-tindakan_id',
            'tagihan',
            'tindakan_id',
            'tindakan',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-tagihan-obat_id',
            'tagihan',
            'obat_id',
            'obat',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-tagihan-pasien_id', 'tagihan');
        $this->dropForeignKey('fk-tagihan-tindakan_id', 'tagihan');
        $this->dropForeignKey('fk-tagihan-obat_id', 'tagihan');
        $this->dropTable('{{%tagihan}}');
    }
}
