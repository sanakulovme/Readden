<?php

namespace frontend\controllers;

use yii;
use frontend\models\Create;
use yii\web\Controller;
use frontend\models\Register;

/**
 *
 */
class CreateController extends Controller
{

	public function actionIndex()
	{
		$model = new Create();

		if ($model->load(Yii::$app->request->post()) && $model->create()) {
        	Yii::$app->session->setFlash('success', 'Success: Fikringiz uchun tashakkur!');
            return $this->redirect('/profile');
        }

		return $this->render('index', ['model' => $model]);
	}
}


?>