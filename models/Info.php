<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

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
 * @property string $email
 * @property string $phone
 * @property string $logo
 */
class Info extends \yii\db\ActiveRecord
{
    /**
     * @var UploadedFile
     */
    public $imageFile;

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
            [['service', 'about', 'email', 'phone'], 'string'],
            [['facebook', 'instagram', 'aparat', 'telegram', 'address'], 'string', 'max' => 255],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
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
            'email' => 'ایمیل',
            'phone' => 'تلفن',
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $this->imageFile->saveAs('uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            return true;
        } else {
            return false;
        }
    }
}
