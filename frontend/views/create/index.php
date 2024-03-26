<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \frontend\models\SigcnupForm $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Blog yozish';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <div class="row justify-content-center align-items-center px-3" style="min-height: 80vh;">
        <div class="col col-md-6">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>
</div>
