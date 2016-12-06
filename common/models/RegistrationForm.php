<?php
namespace common\models;
use Yii;
use yii\base\Model;
use common\models\Account;
use frontend\models\Members;
use backend\models\Auth_assignment;

class RegistrationForm extends Model
{
 /**
 * @inheritdoc
 */
public $first_name;
public $last_name;
public $address;
public $email;
public $date_of_birth;
public $sex;
public $username;
public $password;
public $repassword;
public function rules()
    {
    return [        
    ['email','filter','filter'=> 'trim'],
    ['email', 'email'],
    [['username','password','repassword'], 'required'],    
    [['username'], 'string','max'=>16],
    [['username'],'match','pattern' => '/[0-9^*\X*$]/','enableClientValidation'=>true],
    [['username'],'unique','targetClass' => 'common\models\Account','message' =>'Username ini sudah ada' ],
    [['email'],'unique','targetClass' => 'frontend\models\Member','message' =>'Email ini sudah terdaftar' ], 
    [['password'], 'string', 'min' => 8],
    [['repassword'], 'string', 'max' => 10],
    [['first_name', 'last_name'], 'string', 'max' => 16],
    [['address','email'], 'string', 'max' => 64],
    [['sex'], 'string', 'max' => 1],
    [['repassword'], 'compare', 'compareAttribute' =>'password','message'=>Yii::t('app','Harus sama sama password')],
    [['username','password','email'],'required','on'=>'register'],
   ];
 }
 
/**
 * @inheritdoc
 */
 public function attributeLabels()
 {
 return [
 'first_name' => 'First Name',
 'last_name' => 'Last Name',
 'address' => 'Address',
 'email' => 'Email',
 'username' => 'Username',
 'password' => 'Password',
 'repassword' => 'Retype Password',
 ];
 }
    public function register()
    {
    if ($this->validate()) //rules harus dijalankan
    {
    $account = new Account();
    //$account->password = $this->password;
    $account->username = $this->username;
    
    $account->setPassword($this->password);
   //$member->generateAuthKey();
    if($account->save()){
    //transaction begin
    $member = new \frontend\models\Member();
    $member->account_id = $account->id;
    $member->first_name = $this->first_name;
    $member->last_name = $this->last_name;
    $member->address = $this->address;
    $member->email = $this->email;
    if ($member->save()) {
    $auth_assignment = new \backend\models\AuthAssignment();
    $auth_assignment->item_name = "member" ;
    $auth_assignment->user_id = $account->id;
    if($auth_assignment->save())
    {
     return $account; //return user ygberhasil register
    }  
    
    }else{
    print_r($member->errors);
    }
   }
   else{
        print_r($account->errors);
   }
        return null;
    }
}
}