<?php

namespace frontend\controllers;

use yii\web\Controller;

/**
 *
 */
class BlogController extends Controller
{

	public function actionIndex($id = null)
	{
		if ($id === null) {
			return $this->redirect("/blogs");
		}

		$data = \yii::$app->db->createCommand("SELECT * FROM blog WHERE token = '$id'")->QueryOne();
		return $this->render("index", ['data' => $data]);
	}

	public function actionLogin()
	{
		return $this->render("login");
	}

	public function actionRegister()
	{
		return $this->render("register");
	}
}


?>