<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "statistik".
 *
 * @property int $id_statistik
 * @property int $id_admin
 * @property string $access_time
 * @property string $user_ip
 * @property string $user_host
 *
 * @property Admin $admin
 */
class Statistik extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'statistik';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_admin'], 'integer'],
            [['access_time'], 'safe'],
            [['user_ip', 'user_host'], 'string', 'max' => 255],
            [['id_admin'], 'exist', 'skipOnError' => true, 'targetClass' => Admin::className(), 'targetAttribute' => ['id_admin' => 'id_admin']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_statistik' => 'Id Statistik',
            'id_admin' => 'Id Admin',
            'access_time' => 'Access Time',
            'user_ip' => 'User Ip',
            'user_host' => 'User Host',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdmin()
    {
        return $this->hasOne(Admin::className(), ['id_admin' => 'id_admin']);
    }
}
