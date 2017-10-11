<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

/**
 * This is the model class for table "tbl_info".
 *
 * @property integer $id
 * @property string $about
 * @property string $facebook
 * @property string $instagram
 * @property string $twitter
 * @property string telegram
 * @property string $address
 * @property string $email
 * @property string $phone
 * @property string $logo
 * @property string $image
 * @property string $time
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
            [[ 'about'], 'required'],
            [['about', 'email', 'phone', 'time'], 'string'],
            [['facebook', 'instagram', 'twitter', 'telegram', 'address'], 'string', 'max' => 255],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
            [['logo'], 'string', 'max' => 250],
            ['email', 'email']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'about' => 'درباره ما',
            'facebook' => 'فیس بوک',
            'instagram' => 'اینستگرام',
            'twitter' => 'twitter',
            'telegram' => 'telegram',
            'address' => 'آدرس',
            'email' => 'ایمیل',
            'phone' => 'تلفن',
            'time'=>'تاریخ'
        ];
    }

    public function upload($filename)
    {
        if ($this->validate()) {
           $this->imageFile->saveAs('uploads/' . $filename . '.' . $this->imageFile->extension);
            return true;
        } else {
            return false;
        }
    }
}
