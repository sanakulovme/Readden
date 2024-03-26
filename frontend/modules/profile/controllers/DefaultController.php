<?php

namespace frontend\modules\profile\controllers;

use yii\web\Controller;
use frontend\modules\profile\models\Create;
use frontend\modules\profile\models\Blog;
use yii\data\Pagination;
use yii\db\Query;
use yii;
/**
 *
 */
class DefaultController extends Controller
{

	public function actionIndex()
	{

		if (Yii::$app->user->isGuest) {
			return $this->render('error');
		}

		$model = new Create();

		if ($model->load(Yii::$app->request->post()) && $model->create()) {
        	Yii::$app->session->setFlash('success', 'Success: Fikringiz uchun tashakkur!');
        }

		$Query = Blog::find()
		->where(
			[
				'author_id' => Yii::$app->user->identity->id
			]
		)
		->orderBy("id DESC");

		$total_count = $Query->count();

		$pagination = new Pagination(
			[
				'totalCount' => $total_count,
				'pageSize' => 5,
			]
		);

		$posts = $Query->offset($pagination->offset)
			->limit($pagination->limit)
			->all();

		return $this->render('index', [
			'posts' => $posts,
			'pagination' => $pagination,
			'model' => $model,
			'count' => $total_count
		]);
	}
	public function actionBlog($action = null, $id = null)
	{
		if ($action == 'edit') {
			$data = (new Query())
				->select("*")
				->from("blog")
				->where(
					[
						'author_id' => Yii::$app->user->identity->id,
						'id' => $id
					]
				)
				->one();

			return $this->render('blog/edit', ['data' => $data]);
		}else if ($action == 'delete') {
			return $this->render('blog/delete');
		}
	}

	public function actionDelete()
	{
		return $this->render("login");
	}

	public function actionEdit()
	{
		return $this->render("register");
	}
}


?>