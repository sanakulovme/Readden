<?php

namespace frontend\modules\profile\models;

use yii\base\Model;
use yii;



/**
 *
 */
class Create extends Model
{
    public $body;
	public $title;
    public $token;

	/**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // username and password are both required
            ['body', 'required', 'message' => 'Maydonni bo\'sh qoldirmang!.'],
            ['title', 'required', 'message' => 'Maydonni bo\'sh qoldirmang!.'],
        ];
    }

    public function attributeLabels()
    {
    	return [
            'body' => "Bugun qanday muammoning yechimi haqida yozmoqchisiz?",
    		'title' => "Blog sarlavhasi",
    	];
    }

    public function create()
    {
        if ($this->validate()) {
            $blog = new Blog();

            $blog->body = $this->body;
            $blog->title = $this->title;
            $blog->token = substr(str_shuffle("qwertyuiopasdfghjklzxcvbnm1234567890"), 0, 6);
            $blog->author_id = Yii::$app->user->identity->id;
            $blog->save();
            return true;
        }else{
            Yii::$app->session->setFlash('error', 'Create.php Line:<b>44</b>.');
        }
        return false;
    }

    public function update($author_id, $id)
    {
        $sql = "UPDATE blog SET body = '$this->body', title = '$this->title' WHERE id = $id AND author_id = $author_id";

        \Yii::$app->db->createCommand($sql)->execute();

        return true;
    }
}

?>