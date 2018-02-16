<?php

namespace frontend\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

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
class Pelamar extends ActiveRecord implements IdentityInterface
{

    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;
    public $imageFile;
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
            //[['id'], 'required'],
            [['nik'], 'integer'],
            //[['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
            [[/*'username', 'password_hash', 'password_reset_token', */'email', 'nama_lengkap', 'alamat_ktp', 'provinsi', 'kota', 'deskripsi_keahlian', 'pengalaman_kerja', 'foto', 'jenjang', 'jurusan', 'nama_institusi', 'no_ijazah'], 'string', 'max' => 255],
            //[['auth_key'], 'string', 'max' => 32],
            //[['status_menikah'], 'string', 'max' => 1],
            [['ipk', 'toefl'], 'string', 'max' => 5],
            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DELETED]],
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
            'nik' => 'NIK',
            'nama_lengkap' => 'Nama Lengkap',
            'alamat_ktp' => 'Alamat Ktp',
            'provinsi' => 'Provinsi',
            'kota' => 'Kota',
            'status_menikah' => 'Status Menikah',
            'deskripsi_keahlian' => 'Keahlian',
            'pengalaman_kerja' => 'Pengalaman Kerja',
            'foto' => 'Foto',
            'jenjang' => 'Jenjang Pendidikan',
            'jurusan' => 'Jurusan',
            'ipk' => 'IPK',
            'nama_institusi' => 'Nama Institusi',
            'no_ijazah' => 'No Ijazah',
            'toefl' => 'TOEFL',
        ];
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return bool
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
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
