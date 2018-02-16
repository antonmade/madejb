<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "detail_lowongan".
 *
 * @property int $id
 * @property int $id_lowongan
 *
 * @property Lowongan $lowongan
 * @property Pelamar $id0
 */
class DetailLowongan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'detail_lowongan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_lowongan'], 'required'],
            [['id', 'id_lowongan'], 'integer'],
            [['id', 'id_lowongan'], 'unique', 'targetAttribute' => ['id', 'id_lowongan']],
            [['id_lowongan'], 'exist', 'skipOnError' => true, 'targetClass' => Lowongan::className(), 'targetAttribute' => ['id_lowongan' => 'id_lowongan']],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => Pelamar::className(), 'targetAttribute' => ['id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_lowongan' => 'Id Lowongan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLowongan()
    {
        return $this->hasOne(Lowongan::className(), ['id_lowongan' => 'id_lowongan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(Pelamar::className(), ['id' => 'id']);
    }
}
