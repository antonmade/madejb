<?php
namespace frontend\models;

use yii\base\Model;
use frontend\models\Pelamar;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\frontend\models\Pelamar', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\frontend\models\Pelamar', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new Pelamar();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->status = 0;
        $user->nik = 0;
        $user->nama_lengkap = 'not set';
        $user->alamat_ktp = 'not set';
        $user->provinsi = 'not set';
        $user->kota = 'not set';
        $user->deskripsi_keahlian = 'not set';
        $user->pengalaman_kerja = 'not set';
        $user->foto = '';
        $user->jenjang = 'not set';
        $user->jurusan = 'not set';
        $user->nama_institusi = 'not set';
        $user->no_ijazah = 'not set';
        $user->status_menikah = '';
        $user->ipk = 'null';
        $user->toefl = 'null';
        $user->setPassword($this->password);
        $user->generateAuthKey();
        
        return $user->save() ? $user : null;
    }
}
