<?php

namespace frontend\controllers;

use yii\data\Pagination;
use frontend\modules\profile\models\Blog;
use yii\web\Controller;

class SearchController extends Controller
{

	public function actionIndex($q)
	{

		$Query = Blog::find()
		// ->leftJoin('user', 'user.id=blog.author_id')
		->where(['like', 'body', $q])
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
			->where(['like', 'body', $q])
			->all();

		$data = \yii::$app->db->createCommand("SELECT * FROM blog WHERE body LIKE '%$q%'")->queryAll();
		return $this->render("index", [
			'title' => $q,
			'posts' => $posts,
			'pagination' => $pagination,
			'count' => $total_count
		]);
	}
}


?>