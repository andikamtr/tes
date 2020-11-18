<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "peserta".
 *
 * @property int $id
 * @property string $nama
 * @property string $jk
 * @property string $email
 * @property string $no_telp
 *
 * @property PesertaWebinar $pesertaWebinar
 */
class Peserta extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'peserta';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama', 'jk', 'email', 'no_telp'], 'required'],
            [['nama'], 'string', 'max' => 50],
            [['jk', 'email', 'no_telp'], 'string', 'max' => 45],
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
            'jk' => 'Jk',
            'email' => 'Email',
            'no_telp' => 'No Telp',
        ];
    }

    /**
     * Gets query for [[PesertaWebinar]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPesertaWebinar()
    {
        return $this->hasOne(PesertaWebinar::className(), ['peserta_id' => 'id']);
    }
}
