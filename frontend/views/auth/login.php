<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \common\models\LoginForm $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <div class="row justify-content-center align-items-center px-3" style="min-height: 80vh;">
        <div class="col col-md-4">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
            	<?= $form->field($model, 'username')->textInput(['autofocus' => true, 'class' => 'form-control form-control-lg']) ?>

                <?= $form->field($model, 'password')->passwordInput(['class' => 'form-control form-control-lg']) ?>

                <div class="form-group">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-lg', 'name' => 'login-button']) ?>
                </div>
                <p class="mt-5 mb-3 text-body-secondary">#100DaysOfCode</p>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
