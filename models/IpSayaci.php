<?php

namespace kouosl\ziyaretci_sayaci\models;

use Yii;

/**
 * This is the model class for table "ip_sayaci".
 *
 * @property integer $id
 * @property integer $simdi
 * @property integer $sayac
 * @property string $ip
 * @property integer $gun
 * @property integer $ay
 * @property integer $yil
 */
class IpSayaci extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ip_sayaci';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'simdi', 'sayac', 'ip', 'gun', 'ay', 'yil'], 'required'],
            [['id', 'simdi', 'sayac', 'gun', 'ay', 'yil'], 'integer'],
            [['ip'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'simdi' => 'Simdi',
            'sayac' => 'Sayac',
            'ip' => 'Ip',
            'gun' => 'Gun',
            'ay' => 'Ay',
            'yil' => 'Yil',
        ];
    }
}
