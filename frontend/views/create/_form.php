<?php

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var frontend\models\Category $model */
/** @var yii\widgets\ActiveForm $form */
?>

<?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

<?= $form->field(
    $model,
    'body'
)
->textArea(
    [
        'autofocus' => true,
        'class' => 'form-control form-control-lg my-3',
        'rows' => 10,
    ]
)
?>

<div class="form-group">
    <?= Html::submitButton('Yarating', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
</div>

<?php ActiveForm::end(); ?>
