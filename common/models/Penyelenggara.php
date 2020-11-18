<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "penyelenggara".
 *
 * @property int $id
 * @property string $nama
 * @property string $no_hp
 * @property string $alamat
 *
 * @property Jadwal $jadwal
 */
class Penyelenggara extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'penyelenggara';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama', 'no_hp', 'alamat'], 'required'],
            [['nama', 'no_hp', 'alamat'], 'string', 'max' => 45],
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
            'no_hp' => 'No Hp',
            'alamat' => 'Alamat',
        ];
    }

    /**
     * Gets query for [[Jadwal]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJadwal()
    {
        return $this->hasOne(Jadwal::className(), ['penyelenggara_id' => 'id']);
    }
}
