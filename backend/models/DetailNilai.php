<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "detail_nilai".
 *
 * @property int $id
 * @property int $id_penilaian
 * @property int $nilai
 * @property string $tanggal_penilaian
 * @property string $pemberi_nilai
 *
 * @property Pelamar $id0
 * @property Penilaian $penilaian
 */
class DetailNilai extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'detail_nilai';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_penilaian'], 'required'],
            [['id', 'id_penilaian', 'nilai'], 'integer'],
            [['tanggal_penilaian'], 'safe'],
            [['pemberi_nilai'], 'string', 'max' => 255],
            [['id', 'id_penilaian'], 'unique', 'targetAttribute' => ['id', 'id_penilaian']],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => Pelamar::className(), 'targetAttribute' => ['id' => 'id']],
            [['id_penilaian'], 'exist', 'skipOnError' => true, 'targetClass' => Penilaian::className(), 'targetAttribute' => ['id_penilaian' => 'id_penilaian']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_penilaian' => 'Id Penilaian',
            'nilai' => 'Nilai',
            'tanggal_penilaian' => 'Tanggal Penilaian',
            'pemberi_nilai' => 'Pemberi Nilai',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(Pelamar::className(), ['id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPenilaian()
    {
        return $this->hasOne(Penilaian::className(), ['id_penilaian' => 'id_penilaian']);
    }
}
