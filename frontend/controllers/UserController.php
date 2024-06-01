<?php

namespace frontend\controllers;

use yii\web\Controller;
use common\models\User;


class UserController extends Controller
{

	public function actionIndex($username)
	{
		$this->layout = 'user';
		$this->view->params['username'] = $username;
		$userData = User::find()->where(['username' => $username])->one();

		// if(empty($userData)) return $this->render('site/error'); // error 404

		// setcookie("path_username", $userData->username, time()+time(), '/');

		return $this->render('index', [
			'userData' => $userData
		]);
	}

	public function actionCv($username)
	{
		$this->layout = 'user';

		$userData = User::find()->where(['username' => $username])->one();

		if(empty($userData)) return $this->render('site/error');

		return $this->render('cv-index', [
			'userData' => $userData
		]);
	}
}