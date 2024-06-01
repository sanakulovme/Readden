<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $type;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required', 'message' => 'Foydalanuvchi nomini kiriting!'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Ushbu username allaqachon mavjud!'],
            ['username', 'string', 'min' => 3, 'max' => 255, 'message' => 'Foydalanuvchi nomi kamida 3-ta belgidan iborat bo\'lishi kerak!'],

            ['email', 'trim'],
            ['email', 'required', 'message' => 'Email manzilingizni kiriting!'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Bu emal allaqachon mavjud!'],

            ['password', 'required', 'message' => 'Parolingizni kiriting!'],
            ['password', 'string'],
        ];
    }

    public function attributeLables()
    {
        return [
            'username' => 'Foydalanuvchi nomi'
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => 'Foydalanuvchi nomi',
            'email' => 'Pochta manzilingiz',
            'password' => 'Parol'
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
}
