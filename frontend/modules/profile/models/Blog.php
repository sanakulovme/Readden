<?php

namespace frontend\modules\profile\models;

use common\models\User;
use yii\db\ActiveRecord;

/**
 *
 */
class Blog extends ActiveRecord
{
	public static function tableName()
	{
		return "blog";
	}

	public function getAuthor()
	{
		return $this->hasOne(User::class, [
			'id' => 'author_id'
		]);
	}
}



?>