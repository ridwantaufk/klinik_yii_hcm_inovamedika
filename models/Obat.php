<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "obat".
 *
 * @property int $id
 * @property string $nama
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Tindakan[] $tagihans
 */
class Obat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'obat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama', 'deskripsi', 'harga'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['nama'], 'string', 'max' => 255],
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
            'deskripsi' => 'Deskripsi',
            'harga' => 'Harga Obat',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Tagihans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTindakans()
    {
        return $this->hasMany(Tindakan::class, ['obat_id' => 'id']);
    }

    public function getTagihans()
    {
        return $this->hasMany(Tagihan::class, ['obat_id' => 'id']);
    }
}
