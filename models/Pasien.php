<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pasien".
 *
 * @property int $id
 * @property string $nama
 * @property string|null $tanggal_lahir
 * @property string|null $jenis_kelamin
 * @property string|null $alamat
 * @property int|null $wilayah_id
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Tagihan[] $tagihans
 * @property Wilayah $wilayah
 */
class Pasien extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pasien';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama'], 'required'],
            [['tanggal_lahir', 'created_at', 'updated_at'], 'safe'],
            [['jenis_kelamin', 'alamat'], 'string'],
            [['wilayah_id'], 'integer'],
            [['nama'], 'string', 'max' => 255],
            [['wilayah_id'], 'exist', 'skipOnError' => true, 'targetClass' => Wilayah::class, 'targetAttribute' => ['wilayah_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'tanggal_lahir' => 'Tanggal Lahir',
            'jenis_kelamin' => 'Jenis Kelamin',
            'alamat' => 'Alamat',
            'wilayah_id' => 'Wilayah ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Tagihans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTagihans()
    {
        return $this->hasMany(Tagihan::class, ['pasien_id' => 'id']);
    }

    /**
     * Gets query for [[Wilayah]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWilayah()
    {
        return $this->hasOne(Wilayah::class, ['id' => 'wilayah_id']);
    }

    public function getTindakans()
    {
        return $this->hasMany(Tindakan::class, ['id' => 'pasien_id']);
    }
}
