<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \frontend\models\SignupForm $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Ro\'yxatdan o\'tish';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <div class="row justify-content-center align-items-center px-3" style="min-height: 80vh;">
        <div class="col col-md-4">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'fullname')->textInput(['autofocus' => true, 'class' => 'form-control form-control-lg']) ?>

                <?= $form->field($model, 'username')->textInput(['class' => 'form-control form-control-lg']) ?>

                <?= $form->field($model, 'email')->textInput(['class' => 'form-control form-control-lg']) ?>

                <?= $form->field($model, 'password')->passwordInput(['class' => 'form-control form-control-lg']) ?>

                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'my-btn', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
