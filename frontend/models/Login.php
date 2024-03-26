<?php

namespace frontend\models;

use yii\base\Model;
use yii;

/**
 *
 */
class Login extends Model
{
    public $password;
    public $username;
    private $_user;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // username and password are both required
            ['username', 'required', 'message' => 'Foydalanuvchi nomini kiriting.'],
            ['password', 'required', 'message' => 'Parolni kiriting.'],

            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }

    public function attributeLabels()
    {
    	return [
    		'username' => "Username",
    		'password' => "Parol"
    	];
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser());
        }

        return false;
    }

    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Foydalanuvchi nomini yoki parol xato.');
            }
        }
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = User::findByUsername($this->username);
        }

        return $this->_user;
    }
}