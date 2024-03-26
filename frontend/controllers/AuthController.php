<?php

namespace frontend\controllers;

use yii;
use yii\web\Controller;
use frontend\models\Login;

use frontend\models\Register;

/**
 *
 */
class AuthController extends Controller
{

	public function actionIndex()
	{
		return $this->redirect('/auth/login');
	}

	public function actionLogin()
	{
		if (!Yii::$app->user->isGuest) {
            return $this->redirect('/profile');
        }

		$model = new Login();

		if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

		return $this->render("login", [
            'model' => $model,
        ]);
	}

	public function actionRegister()
	{
		if (!Yii::$app->user->isGuest) {
            return $this->redirect('/profile');
        }

		$model = new Register();

        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', 'Raxmat! Emailingizni tastiqlash uchun biz unga link yubordik.');
            return $this->goHome();
        }

		return $this->render("register", [
			"model" => $model
		]);
	}
}


?>