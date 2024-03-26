<?php

namespace frontend\controllers;

use yii\web\Controller;
use frontend\modules\profile\models\Blog;
use yii\data\Pagination;
use Yii;

/**
 *
 */
class BlogsController extends Controller
{

	public function actionIndex()
	{
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
				'pageSize' => 10,
			]
		);

		$posts = $Query->offset($pagination->offset)
			->limit($pagination->limit)
			->all();
		// echo "<pre>";
		// print_r($data);die();
		return $this->render('index', [
			'posts' => $posts,
			'pagination' => $pagination,
			'count' => $total_count
		]);
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