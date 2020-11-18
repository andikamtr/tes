<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "peserta_webinar".
 *
 * @property int $id
 * @property int $peserta_id
 * @property int $jadwal_id
 * @property string $waktu_daftar
 *
 * @property Jadwal $jadwal
 * @property Peserta $peserta
 */
class PesertaWebinar extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'peserta_webinar';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['peserta_id', 'jadwal_id', 'waktu_daftar'], 'required'],
            [['peserta_id', 'jadwal_id'], 'integer'],
            [['waktu_daftar'], 'safe'],
            [['jadwal_id'], 'unique'],
            [['peserta_id'], 'unique'],
            [['jadwal_id'], 'exist', 'skipOnError' => true, 'targetClass' => Jadwal::className(), 'targetAttribute' => ['jadwal_id' => 'id']],
            [['peserta_id'], 'exist', 'skipOnError' => true, 'targetClass' => Peserta::className(), 'targetAttribute' => ['peserta_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'peserta_id' => 'Peserta ID',
            'jadwal_id' => 'Jadwal ID',
            'waktu_daftar' => 'Waktu Daftar',
        ];
    }

    /**
     * Gets query for [[Jadwal]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJadwal()
    {
        return $this->hasOne(Jadwal::className(), ['id' => 'jadwal_id']);
    }

    /**
     * Gets query for [[Peserta]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPeserta()
    {
        return $this->hasOne(Peserta::className(), ['id' => 'peserta_id']);
    }
}
