<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "jadwal".
 *
 * @property int $id
 * @property int $penyelenggara_id
 * @property int $webinar_id
 * @property string $daftar_awal
 * @property string $daftar_akhir
 *
 * @property Webinar $webinar
 * @property Penyelenggara $penyelenggara
 * @property PesertaWebinar $pesertaWebinar
 */
class Jadwal extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jadwal';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['penyelenggara_id', 'webinar_id', 'daftar_awal', 'daftar_akhir'], 'required'],
            [['penyelenggara_id', 'webinar_id'], 'integer'],
            [['daftar_awal', 'daftar_akhir'], 'safe'],
            [['webinar_id'], 'unique'],
            [['penyelenggara_id'], 'unique'],
            [['webinar_id'], 'exist', 'skipOnError' => true, 'targetClass' => Webinar::className(), 'targetAttribute' => ['webinar_id' => 'id']],
            [['penyelenggara_id'], 'exist', 'skipOnError' => true, 'targetClass' => Penyelenggara::className(), 'targetAttribute' => ['penyelenggara_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'penyelenggara_id' => 'Penyelenggara ID',
            'webinar_id' => 'Webinar ID',
            'daftar_awal' => 'Daftar Awal',
            'daftar_akhir' => 'Daftar Akhir',
        ];
    }

    /**
     * Gets query for [[Webinar]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWebinar()
    {
        return $this->hasOne(Webinar::className(), ['id' => 'webinar_id']);
    }

    /**
     * Gets query for [[Penyelenggara]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPenyelenggara()
    {
        return $this->hasOne(Penyelenggara::className(), ['id' => 'penyelenggara_id']);
    }

    /**
     * Gets query for [[PesertaWebinar]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPesertaWebinar()
    {
        return $this->hasOne(PesertaWebinar::className(), ['jadwal_id' => 'id']);
    }
}
