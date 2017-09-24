<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_info".
 *
 * @property integer $id
 * @property string $service
 * @property string $about
 * @property string $facebook
 * @property string $instagram
 * @property string $aparat
 * @property string $telegram
 * @property string $address
 */
class Info extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['service', 'about'], 'required'],
            [['service', 'about'], 'string'],
            [['facebook', 'instagram', 'aparat', 'telegram', 'address'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
          'service' => 'سرویس',
          'about' => 'درباره ما',
          'facebook' => 'فیس بوک',
          'instagram' => 'اینستگرام',
          'aparat' => 'آپارات',
          'telegram' => 'تلگرام',
          'address' => 'آدرس',
        ];
    }
}
