<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%pasien}}`.
 */
class m230912_084550_create_pasien_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%pasien}}', [
            'id' => $this->primaryKey(),
            'nama' => $this->string(255)->notNull(),
            'tanggal_lahir' => $this->date(),
            'jenis_kelamin' => "ENUM('Laki-laki', 'Perempuan')",
            'alamat' => $this->text(),
            'wilayah_id' => $this->integer(),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
        ]);

        $this->addForeignKey(
            'fk-pasien-wilayah_id',
            'pasien',
            'wilayah_id',
            'wilayah',
            'id',
            'SET NULL' // Atur tindakan jika wilayah dihapus (misalnya: SET NULL)
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%pasien}}');
    }
}
