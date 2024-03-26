<?php

namespace frontend\modules\profile\controllers;

use yii\web\Controller;
use frontend\modules\profile\models\Create;
use yii;


/**
 *
 */
class BlogController extends Controller
{
	public function actionIndex($action = null, $id = null)
	{
		$model = new Create();

		if ($model->load(Yii::$app->request->post()) && $model->update(Yii::$app->user->identity->id, $id)) {
        	Yii::$app->session->setFlash('success', 'Success: Blog Yangilandi!');
        	return $this->redirect('/profile');
        }

		if ($action == 'edit') {

			$data = (new \yii\db\Query())
			->select("*")
			->from("blog")
			->where([
				'id' => $id,
				'author_id' => Yii::$app->user->identity->id
			])
			->one();

			return $this->render("edit", ['data' => $data, 'model' => $model]);
		}else if ($action == 'delete') {
			$sql = "DELETE FROM blog WHERE id = $id AND author_id = ".\Yii::$app->user->identity->id;
        	$result = \Yii::$app->db->createCommand($sql)->execute();
        	Yii::$app->session->setFlash('success', 'Blog olib tashlandi!');
			return $this->redirect('/profile');
		}
	}
}



?>