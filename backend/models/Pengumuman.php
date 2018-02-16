<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "pengumuman".
 *
 * @property int $id_pengumuman
 * @property int $id_admin
 * @property string $nama_pengumuman
 * @property string $tanggal_pengumuman
 * @property string $file_pengumuman
 *
 * @property Admin $admin
 */
class Pengumuman extends \yii\db\ActiveRecord
{
    public $pdfFile;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pengumuman';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_admin'], 'integer'],
            [['tanggal_pengumuman'], 'safe'],
            [['pdfFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'pdf'],
            [['nama_pengumuman', 'file_pengumuman'], 'string', 'max' => 255],
            [['id_admin'], 'exist', 'skipOnError' => true, 'targetClass' => Admin::className(), 'targetAttribute' => ['id_admin' => 'id_admin']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_pengumuman' => 'Id Pengumuman',
            'id_admin' => 'Id Admin',
            'nama_pengumuman' => 'Nama Pengumuman',
            'tanggal_pengumuman' => 'Tanggal Pengumuman',
            'file_pengumuman' => 'File Pengumuman',
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
