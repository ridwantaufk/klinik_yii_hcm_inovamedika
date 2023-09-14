<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tagihan".
 *
 * @property int $id
 * @property int|null $pasien_id
 * @property int|null $tindakan_id
 * @property int|null $obat_id
 * @property float|null $jumlah
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Obat $obat
 * @property Pasien $pasien
 * @property Tindakan $tindakan
 */
class Tagihan extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tagihan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pasien_id', 'tindakan_id', 'obat_id'], 'integer'],
            [['jumlah'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['obat_id'], 'exist', 'skipOnError' => true, 'targetClass' => Obat::class, 'targetAttribute' => ['obat_id' => 'id']],
            [['pasien_id'], 'exist', 'skipOnError' => true, 'targetClass' => Pasien::class, 'targetAttribute' => ['pasien_id' => 'id']],
            [['tindakan_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tindakan::class, 'targetAttribute' => ['tindakan_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pasien_id' => 'Pasien ID',
            'tindakan_id' => 'Tindakan ID',
            'obat_id' => 'Obat ID',
            'jumlah' => 'Jumlah',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Pasien]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPasien()
    {
        return $this->hasOne(Pasien::class, ['id' => 'pasien_id']);
    }

    /**
     * Gets query for [[Tindakan]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTindakan()
    {
        return $this->hasOne(Tindakan::class, ['id' => 'tindakan_id']);
    }
    public function getObat()
    {
        return $this->hasOne(Obat::class, ['id' => 'obat_id']);
    }
}
