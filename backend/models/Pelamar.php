<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "pelamar".
 *
 * @property int $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property int $status
 * @property string $nik
 * @property string $nama_lengkap
 * @property string $alamat_ktp
 * @property string $provinsi
 * @property string $kota
 * @property string $status_menikah
 * @property string $deskripsi_keahlian
 * @property string $pengalaman_kerja
 * @property string $foto
 * @property string $jenjang
 * @property string $jurusan
 * @property string $ipk
 * @property string $nama_institusi
 * @property string $no_ijazah
 * @property string $toefl
 *
 * @property DetailLowongan[] $detailLowongans
 * @property Lowongan[] $lowongans
 * @property DetailNilai[] $detailNilais
 * @property Penilaian[] $penilaians
 */
class Pelamar extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pelamar';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['nik'], 'required'],
            [['username', 'password_hash', 'password_reset_token', 'email', 'nik', 'nama_lengkap', 'alamat_ktp', 'provinsi', 'kota', 'deskripsi_keahlian', 'pengalaman_kerja', 'foto', 'jenjang', 'jurusan', 'nama_institusi', 'no_ijazah'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['status_menikah'], 'string', 'max' => 1],
            [['ipk', 'toefl'], 'string', 'max' => 5],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'status' => 'Status',
            'nik' => 'Nik',
            'nama_lengkap' => 'Nama Lengkap',
            'alamat_ktp' => 'Alamat Ktp',
            'provinsi' => 'Provinsi',
            'kota' => 'Kota',
            'status_menikah' => 'Status Menikah',
            'deskripsi_keahlian' => 'Deskripsi Keahlian',
            'pengalaman_kerja' => 'Pengalaman Kerja',
            'foto' => 'Foto',
            'jenjang' => 'Jenjang',
            'jurusan' => 'Jurusan',
            'ipk' => 'Ipk',
            'nama_institusi' => 'Nama Institusi',
            'no_ijazah' => 'No Ijazah',
            'toefl' => 'Toefl',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetailLowongans()
    {
        return $this->hasMany(DetailLowongan::className(), ['id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLowongans()
    {
        return $this->hasMany(Lowongan::className(), ['id_lowongan' => 'id_lowongan'])->viaTable('detail_lowongan', ['id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetailNilais()
    {
        return $this->hasMany(DetailNilai::className(), ['id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPenilaians()
    {
        return $this->hasMany(Penilaian::className(), ['id_penilaian' => 'id_penilaian'])->viaTable('detail_nilai', ['id' => 'id']);
    }
}
