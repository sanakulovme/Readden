<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class Register extends Model
{
    public $username;
    public $email;
    public $password;
    public $fullname;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required', 'message' => 'Foydalanuvchi nomini kiriting!'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Bu Foydalanuvchi nomi allaqachon olingan.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['fullname', 'trim'],
            ['fullname', 'required', 'message' => 'Ism familyangizni kiriting!'],
            ['fullname', 'string', 'min' => 2, 'max' => 50],

            ['email', 'trim'],
            ['email', 'required', 'message' => 'Email manzilni nomini kiriting!'],
            ['email', 'email', 'message' => 'Email manzil xato kiritilgan!'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Bu email allaqachon olingan.'],

            ['password', 'required', 'message' => 'Parolni kiriting!'],
            ['password', 'string', 'min' => Yii::$app->params['user.passwordMinLength']],
        ];
    }

    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->fullname = $this->fullname;

        $user->setPassword($this->password);

        $user->generateAuthKey();
        $user->generateEmailVerificationToken();

        return $user->save() && $this->sendEmail($user);
    }

    /**
     * Sends confirmation email to user
     * @param User $user user model to with email should be send
     * @return bool whether the email was sent
     */
    protected function sendEmail($user)
    {
        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
                ['user' => $user]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
            ->setTo($this->email)
            ->setSubject('Account registration at ' . Yii::$app->name)
            ->send();
    }

    public function attributeLabels()
    {
        return [
            'fullname' => 'Ism Familya',
            'password' => 'Parol'
        ];
    }

}
