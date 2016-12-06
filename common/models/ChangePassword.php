<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class ChangePassword extends ActiveRecord
{
    public $currentPassword;
    public $newPassword;
    public $newPasswordConfirm;

     public static function tableName()
    {
        return 'account';
    }
    
     public function rules()
    {
        return [
            [['newPassword', 'currentPassword','newPasswordConfirm'], 'required'],
            [['currentPassword'], 'validateCurrentPassword'],
            [['newPassword', 'newPasswordConfirm'], 'filter','filter'=>'trim'],
            [['newPasswordConfirm'], 'compare','compareAttribute'=>'newPassword','message'=>'Password don not match'],            
        ];
    }
    
    public function validateCurrentPassword(){        
        if(!$this->verifyPassword($this->currentPassword)){
            $this->addError("currentPassword","current password incorrect");
        }
    }
    
    public function verifyPassword($password){
        $dbpassword = static::findOne(['username'=>Yii::$app->user->identity->username])->password;
        return Yii::$app->security->validatePassword($password,$dbpassword);
    }
    
}   