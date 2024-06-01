<?php

/** @var \yii\web\View $this */
/** @var string $content */

use common\widgets\Alert;
use frontend\assets\UserAsset;
use yii\helpers\Html;
use yii\widgets\Dropdown;
use yii\helpers\Url;

UserAsset::register($this);

$username = isset($this->params['username']) ? $this->params['username'] : 'Guest';

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title> <?= $username ?> | resum.uz | Online rezyumelar platformasi</title>
    <?php $this->head() ?>
</head>
<body class="hold-transition layout-top-nav">
<?php $this->beginBody() ?>

<nav>
	<div class="container">
		<div class="nav-box">
			<ul class="navbar">
				<li class="nav-item">
					<a href="/<?= $_COOKIE['path_username'] ?>/cv" class="nav-link">Rezyume</a>
				</li>
				<li class="nav-item">
					<a href="/<?= $_COOKIE['path_username'] ?>/portfolio" class="nav-link">Portfolio</a>
				</li>
				<li class="nav-item">
					<a href="/<?= $_COOKIE['path_username'] ?>/blog" class="nav-link">Blog</a>
				</li>
				<li class="nav-item">
					<a href="#" class="nav-link">Feedback</a>
				</li>
			</ul>
			<ul class="profile-ul">
				<li class="dropdown">
					<img src="/images/avatars/Default_Prsofile_Picture.png" alt="" class="avatar-img">
					<?php if (!Yii::$app->user->isGuest && Yii::$app->user->identity->username): ?>
					<ul>
						<li>
							<a href="/<?= $_COOKIE['path_username'] ?>/edit">Edit profile</a>
						</li>
						<li>
							<?php
	                        echo Html::beginForm(['/site/logout'], 'post', ['class' => 'flex', 'style' => ['margin-top' => '10px']])
				            . Html::submitButton(
				                'Logout',
				                ['class' => 'my-btn', 'style' => ['padding' => '10px 15px']]
				            )
				            . Html::endForm();
					                        ?>
						</li>
					</ul>
					<?php endif ?>
				</li>
			</ul>
		</div>
	</div>
</nav>
<?= $content ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();
