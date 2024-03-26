<?php

/** @var \yii\web\View $this */
/** @var string $content */

use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\bootstrap5\Dropdown;

AppAsset::register($this);
// \frontend\assets\MyAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="hold-transition layout-top-nav">
<?php $this->beginBody() ?>

<header class="">
    <?php
        NavBar::begin([
            'brandLabel' => 'Readden',
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'main-header navbar navbar-expand-lg navbar-light navbar-white py-3 border-bottom mb-4',
            ],
        ]);

        $menuItems = [
            [
                'label' => 'Bloglar',
                'url' => ['/blogs']
            ],
            [
                'label' => 'Categoriya',
                'items' => [
                    [
                        'label' => 'Dropdown A',
                        'url' => '#'
                    ],
                     [
                        'label' => 'Dropdown B',
                        'url' => '#'
                    ],
                ],
            ],
            [
                'label' => 'Categoriya(til)',
                'items' => [
                    [
                        'label' => 'Dropdown A',
                        'url' => '#'
                    ],
                     [
                        'label' => 'Dropdown B',
                        'url' => '#'
                    ],
                ],
            ],
        ];

        echo Nav::widget([
            'options' => ['class' => 'navbar-nav me-auto mb-2 mb-md-0'],
            'items' => $menuItems,
        ]);

        ?>
        <?php

        if (Yii::$app->user->isGuest) {
            echo "<div class='d-flex gap-3'>";
            echo Html::a('Kirish <i class="fa fa-user"></i>',['/auth/login'], ['class' => ['nav-link']]);
            echo Html::a('Ro\'yxatdan o\'tish <i class="fa fa-arrow-right"></i>',['/auth/register'], ['class' => ['nav-link']]);
            echo "</div>";
        } else {
            echo "<div class='d-flex gap-3'>";
            echo Html::a('<i class="fa fa-user mx-1"></i>'.Yii::$app->user->identity->username,['/profile'], ['class' => ['nav-link']]);

            echo Html::beginForm(['/site/logout'], 'post', ['class' => 'd-flex'])
                . Html::submitButton(
                    'Logout <i class="fa fa-arrow-right"></i>',
                    ['class' => 'nav-link logout']
                )
                . Html::endForm();
            echo "</div>";
        }
        NavBar::end();

    ?>
</header>

<main role="main" class="">
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer class="footer mt-auto py-3 text-muted">
    <div class="container">

    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();
