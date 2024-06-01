<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \common\models\LoginForm $model */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

$this->title = 'Login';

?>
<div class="auth-row">
    <div class="auth-col login">
        <div class="auth-col-title"><?= Html::encode($this->title) ?></div>
        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
            <div class="error-modal"></div>
                <?= $form->field($model, 'username')->textInput(['autofocus' => true,])?>
                <?= $form->field($model, 'password')->passwordInput() ?>
            <div class="form-group">
                <?= Html::submitButton('Login', ['class' => 'my-btn', 'name' => 'login-button']) ?>
            </div>
            <p>Akkaunt yo'qmi? <?= Html::a("Ro'yxatdan o'tish", Url::to('/register')) ?></p>
            <hr style="margin: 10px 0;">
        <p><?= Html::a("Bosh sahifa", Url::to('/')) ?></p>
        <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
