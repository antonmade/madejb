<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "lowongan".
 *
 * @property int $id_lowongan
 * @property int $id_admin
 * @property string $nama_lowongan
 * @property string $status_lowongan
 * @property string $kriteria
 * @property string $tanggal_lowongan
 *
 * @property DetailLowongan[] $detailLowongans
 * @property Pelamar[] $ids
 * @property Admin $admin
 */
class Lowongan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lowongan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_admin'], 'integer'],
            [['tanggal_lowongan'], 'safe'],
            [['nama_lowongan'], 'string', 'max' => 255],
            [['status_lowongan'], 'string', 'max' => 1],
            [['kriteria'], 'string', 'max' => 1000],
            [['id_admin'], 'exist', 'skipOnError' => true, 'targetClass' => Admin::className(), 'targetAttribute' => ['id_admin' => 'id_admin']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_lowongan' => 'Id Lowongan',
            'id_admin' => 'Id Admin',
            'nama_lowongan' => 'Nama Lowongan',
            'status_lowongan' => 'Status Lowongan',
            'kriteria' => 'Kriteria',
            'tanggal_lowongan' => 'Tanggal Lowongan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetailLowongans()
    {
        return $this->hasMany(DetailLowongan::className(), ['id_lowongan' => 'id_lowongan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIds()
    {
        return $this->hasMany(Pelamar::className(), ['id' => 'id'])->viaTable('detail_lowongan', ['id_lowongan' => 'id_lowongan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdmin()
    {
        return $this->hasOne(Admin::className(), ['id_admin' => 'id_admin']);
    }
}
