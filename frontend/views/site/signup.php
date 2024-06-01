<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \frontend\models\SignupForm $model */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

$this->title = 'Ro\'yxatdan o\'tish';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-row">
    <div class="auth-col">
        <div class="auth-col-title"><?= Html::encode($this->title) ?></div>
        <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
        <!-- <?= $form->field($model, 'type', ['options' => ['class' => 'list-group']])->radioList([
            "user" => "Men ishchiman Rezume yaratish, teglar qo'shish.",
            'client' => 'Men ish beruvchiman Rezumelarni tahrirlash, qabul qilish.'
        ])->label("Siz kimsiz?") ?> -->
        <?= $form->field($model, 'username')->textInput() ?>
        <?= $form->field($model, 'email') ?>
        <?= $form->field($model, 'password')->passwordInput() ?>
        <div class="form-group">
            <?= Html::submitButton("Ro'yxatdan o'tish", ['class' => 'my-btn', 'name' => 'signup-button']) ?>
        </div>
        <p>Akkauntingiz bormi? <?= Html::a("Kirish", Url::to('/login')) ?></p>
        <hr style="margin: 10px 0;">
        <p><?= Html::a("Bosh sahifa", Url::to('/')) ?></p>
        <?php ActiveForm::end(); ?>
    </div>
</div>
