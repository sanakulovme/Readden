<?php

/** @var \yii\web\View $this */
/** @var string $content */

use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\helpers\Html;
use yii\widgets\Dropdown;
use yii\helpers\Url;

AppAsset::register($this);

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

<!-- <nav>
    <div class="container">
        <div class="navbar" id="nav">
            <ul class="navbar-nav animat_top">
                <li class="nav-item">
                    <a href="/docs" class="my-btn">Qo'llanma</a>
                </li>
                <li class="nav-item">
                    <a href="/search" class="my-btn">Ishchi izlang</a>
                </li>
            </ul>
            <ul class="navbar-right animat_top">
                <?php if (Yii::$app->user->isGuest): ?>
                <li class="nav-item">
                    <a href="/login" class="my-btn">Kirish <i class="fa fa-exit"></i></a>
                </li>
                <li class="nav-item">
                    <a href="/register" class="my-btn">Ro'yxatdan o'tish</a>
                </li>
                <?php else: ?>
                <li class="nav-item">
                    <?= Html::a(Yii::$app->user->identity->username, Url::to(['/user', 'username' => Yii::$app->user->identity->username]), ['class' => 'my-btn']) ?>
                </li>
                <?php endif ?>

            </ul>
        </div>
        <div class="navIcon" id="navIcon">
                <span></span>
                <span></span>
                <span></span>
            </div>
    </div>
</nav> -->

<main role="main" class="">
    <div class="container">
        <?= Alert::widget() ?>
    </div>
    <?= $content ?>
</main>

<!-- <footer class="">
            <div class="container">
                <div class="footer-row">
                    <div class="footer-col">
                        <ul>
                            <li>Sahifalar</li>
                            <li>
                                <a href="/docs" class="footer-link">Qo'llanma</a>
                            </li>
                            <li>
                                <a href="/about" class="footer-link">Biz haqimizda</a>
                            </li>
                            <li>
                                <a href="/search" class="footer-link">Ishchi izlash</a>
                            </li>
                            <li>
                                <a href="/register" class="footer-link">Ro'yxatdan o'tish</a>
                            </li>
                            <li>
                                <a href="/login" class="footer-link">Kirish</a>
                            </li>
                        </ul>
                    </div>
                    <div class="footer-col">
                        <ul>
                            <li>Manbalar</li>
                            <li>
                                <a href="https://fontawesome.com/" target="_blank" class="footer-link">Font awesome</a>
                            </li>
                            <li>
                                <a href="https://getbootstrap.com/" class="footer-link">Bootstrap</a>
                            </li>
                            <li>
                                <a href="https://adminlte.io/" class="footer-link">AdminLite css</a>
                            </li>
                            <li>
                                <a href="https://codemirror.net/" class="footer-link">Codemirror</a>
                            </li>
                            <li>
                                <a href="https://scrollrevealjs.org/" class="footer-link">ScrollReveal</a>
                            </li>
                            <li>
                                <a href="https://blush.design/" class="footer-link">Blush design</a>
                            </li>
                        </ul>
                    </div>
                    <div class="footer-col">
                        <ul>
                            <li>Bog'lanish</li>
                            <li>
                                <a href="mailto:abbossana@gmail.com" target="_blank" class="footer-link">Email</a>
                            </li>
                            <li>
                                <a href="tel:+998904791563" class="footer-link">Telefon</a>
                            </li>
                            <li>
                                <a href="https://t.me/sanakulovme" class="footer-link">Telegram</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
</footer> -->
<!-- <p class="copright">Barcha huquqlar himoyalangan. &copy; <?= date("Y") ?>. Powerd by <a target="_blank" href="https://sanakulov.uz/">Abbos Sanakulov</a></p> -->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();
