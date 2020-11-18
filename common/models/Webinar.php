<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "webinar".
 *
 * @property int $id
 * @property string $tema
 * @property string $judul
 *
 * @property Jadwal $jadwal
 */
class Webinar extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'webinar';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tema', 'judul'], 'required'],
            [['tema'], 'string', 'max' => 50],
            [['judul'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tema' => 'Tema',
            'judul' => 'Judul',
        ];
    }

    /**
     * Gets query for [[Jadwal]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJadwal()
    {
        return $this->hasOne(Jadwal::className(), ['webinar_id' => 'id']);
    }
}
