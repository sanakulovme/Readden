<?php

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var frontend\models\Category $model */
/** @var yii\widgets\ActiveForm $form */

$form = ActiveForm::begin(['id' => 'form-signup']);

echo $form->field(
    $model,
    'title'
)
->input(
    'text',
    [
        'autofocus' => true,
        'class' => 'form-control form-control-lg my-3',
        'value' => $title,
    ],
);

echo $form->field(
    $model,
    'body'
)
->textArea(
    [
        'class' => 'form-control form-control-lg my-3',
        'rows' => 10,
        'value' => $body
    ]
);

?>

<div class="form-group">
    <?= Html::submitButton('Yangilash', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
</div>

<?php ActiveForm::end(); ?>
