<?php

namespace frontend\models;

use yii\base\Model;

class MyLogin extends Model
{
	public $email;
	public $first_name;
	public $age;
	public $gender;

	public function rules()
	{
		return [
			[['email', 'first_name', 'age'], 'required', 'message' => "Yaroqsiz qator!"],
			['age', 'integer'],
			['first_name', 'string'],
			['email', 'email'],
		];
	}

	public function attributeLabels(){
		return [
			'age' => "yoshi",
			'first_name' => 'ismi',
			'email' => "Pochta "
		];
	}

	public function myFunction()
	{
		echo $this->age;
	}
}

 ?>