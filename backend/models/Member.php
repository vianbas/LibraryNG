<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "member".
 *
 * @property string $id
 * @property string $account_id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $address
 *
 * @property Loan[] $loans
 * @property Loan[] $loans0
 * @property Account $account
 */
class Member extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
     public $file;
    public static function tableName()
    {
        return 'member';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['account_id', 'first_name'], 'required'],
            [['account_id'], 'integer'],
            [['first_name', 'last_name'], 'string', 'max' => 64],
            [['email', 'address'], 'string', 'max' => 128],
             [['file'],'safe'],
            [['file'],'file','extensions'=>'jpg,gif,png'],
            
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'account_id' => 'Account ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'email' => 'Email',
            'address' => 'Address',
            'file'=>'Photo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLoans()
    {
        return $this->hasMany(Loan::className(), ['borrower_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLoans0()
    {
        return $this->hasMany(Loan::className(), ['staff_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccount()
    {
        return $this->hasOne(Account::className(), ['id' => 'account_id']);
    }
}
