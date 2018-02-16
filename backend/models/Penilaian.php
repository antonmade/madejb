<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "penilaian".
 *
 * @property int $id_penilaian
 * @property int $id_admin
 * @property string $nama_penilaian
 *
 * @property DetailNilai[] $detailNilais
 * @property Pelamar[] $ids
 * @property Admin $admin
 */
class Penilaian extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'penilaian';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_admin'], 'integer'],
            [['nama_penilaian'], 'string', 'max' => 255],
            [['id_admin'], 'exist', 'skipOnError' => true, 'targetClass' => Admin::className(), 'targetAttribute' => ['id_admin' => 'id_admin']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_penilaian' => 'Id Penilaian',
            'id_admin' => 'Id Admin',
            'nama_penilaian' => 'Nama Penilaian',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetailNilais()
    {
        return $this->hasMany(DetailNilai::className(), ['id_penilaian' => 'id_penilaian']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIds()
    {
        return $this->hasMany(Pelamar::className(), ['id' => 'id'])->viaTable('detail_nilai', ['id_penilaian' => 'id_penilaian']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdmin()
    {
        return $this->hasOne(Admin::className(), ['id_admin' => 'id_admin']);
    }
}
