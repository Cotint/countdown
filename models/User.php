<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_user".
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $token
 */
class User extends \yii\db\ActiveRecord
{
    public $repeatpassword;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password', 'email' ,'repeatpassword'], 'required'],
            [['password'], 'string'],
            ['repeatpassword', 'compare', 'compareAttribute'=>'password', 'message'=>"Passwords don't match" ],
            [['username'], 'string', 'max' => 30],
          [['email'], 'string', 'max' => 60],
            ['token', 'string']
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
            'password' => 'Password',
            'email' => 'email',
            'token'=> 'token',
            'repeatpassword'=>'repeat password',
        ];
    }
}
