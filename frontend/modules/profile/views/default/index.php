<?php

$this->title = "Blogs - ".Yii::$app->user->identity->fullname;
use yii\bootstrap5\Html;
use yii\bootstrap5\Modal;
use yii\bootstrap5\Button;
use yii\bootstrap5\LinkPager;

?>

<div class="row justify-content-between flex-row">
	<div class="col">
		<img src="/images/uploads/Default_Prsofile_Picture.png" class="col-3 col-md-2 mx-auto d-block" alt="">
		<h4 class="display-6 text-center my-3	"><?= Yii::$app->user->identity->fullname ?></h4>
		<?php
		echo Html::a(
			"Blog Yozish!",
			'/create',
			[
				'class' => 'btn btn-primary',
				'id' => 'create-button'
			]
		);

		echo Html::button("<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 268.765 268.765' width='22'>
                    <path fill-rule='evenodd' d='M267.92 119.46c-.425-3.778-4.83-6.617-8.64-6.617-12.315 0-23.243-7.23-27.826-18.414-4.682-11.454-1.663-24.812 7.515-33.23a7.463 7.463 0 0 0 .817-10.133 132.977 132.977 0 0 0-21.289-21.5 7.48 7.48 0 0 0-10.213.825c-8 8.87-22.398 12.168-33.516 7.53-11.57-4.867-18.866-16.59-18.152-29.176a7.455 7.455 0 0 0-6.595-7.849 134.163 134.163 0 0 0-30.232-.08 7.478 7.478 0 0 0-6.654 7.689c.438 12.46-6.946 23.98-18.4 28.672-10.985 4.487-25.272 1.218-33.266-7.574-2.642-2.896-7.063-3.252-10.14-.853a133.478 133.478 0 0 0-21.74 21.493c-2.48 3.086-2.116 7.56.802 10.214 9.353 8.47 12.373 21.944 7.514 33.53-4.64 11.046-16.11 18.165-29.24 18.165-4.26-.137-7.296 2.723-7.762 6.597a134.618 134.618 0 0 0-.058 30.561c.422 3.794 4.96 6.608 8.812 6.608 11.702-.3 22.937 6.946 27.65 18.415 4.698 11.454 1.678 24.804-7.514 33.23a7.469 7.469 0 0 0-.817 10.126 133.459 133.459 0 0 0 21.259 21.508c3.08 2.48 7.56 2.13 10.228-.8 8.04-8.893 22.427-12.184 33.5-7.536 11.6 4.852 18.895 16.575 18.18 29.167a7.464 7.464 0 0 0 6.595 7.85 133.572 133.572 0 0 0 30.233.081 7.479 7.479 0 0 0 6.653-7.696c-.45-12.454 6.946-23.973 18.386-28.657 11.06-4.517 25.286-1.21 33.28 7.572a7.51 7.51 0 0 0 10.142.848 133.787 133.787 0 0 0 21.74-21.494 7.461 7.461 0 0 0-.803-10.213c-9.353-8.47-12.388-21.946-7.53-33.524 4.568-10.9 15.612-18.217 27.49-18.217l1.662.043c3.853.313 7.398-2.655 7.865-6.588a134.504 134.504 0 0 0 .06-30.561zm-133.325 60.03c-24.718 0-44.824-20.106-44.824-44.824s20.106-44.824 44.824-44.824 44.823 20.107 44.823 44.824-20.106 44.824-44.823 44.824z' fill='#fff'></path>
                </svg>", ['class' => 'btn btn-primary mx-2']);

		Modal::begin([
			'title' => "<h4>O'z tajribangizni boshqalar bilan bo'lishing.</h4>",
			'id' => 'mymodal',
			'size' => 'modal-lg',
		]);

		echo $this->render('_form', [
            'model' => $model,
        ]);


		Modal::end();
		?>

	</div>
</div>
<hr>
<div class="text-center fs-4 pt-5">Bloglar <span style="width: 40px; height: 40px; " class="pt-2 bg-primary text-white d-flex justify-content-center align-items-center p-2 rounded-circle border border-2 border-secondary"><?= $count ?></span></div>

<div class="row pt-5">
	<?php
	foreach ($posts as $item) { ?>
		<div class="col-12 col-md-6 p-3" style="position: relative;">
			<div class="actionBox" style="position: absolute; bottom: 30px;right: 30px;">
				<a href="/profile/blog?action=edit&id=<?= $item->id ?>" class="btn btn-primary py-1 px-2">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width='1rem' fill='#fff'>
						<path d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z"/>
					</svg>
				</a>

				<a href="/profile/blog?action=delete&id=<?= $item->id ?>" class="btn btn-danger py-1 px-2">
					<svg xmlns='http://www.w3.org/2000/svg' height='1rem' viewBox='0 0 448 512' fill='#fff'>
						<path d='M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z'/>
					</svg>
				</a>
			</div>
		<a href="/blog/<?= $item->token ?>" class="text-decoration-none border border-1 d-block p-3 rounded-2 shadow-sm bloc-col scrol-no" style="height: 250px; overflow-y: auto;">
			<div class="row align-items-center">
				<img src="/images/uploads/Default_Prsofile_Picture.png" class="col-2 mb-md-0 mb-3" alt="">
				<div class="col-12 col-md-10 my-md-3">
					<h5><?= Yii::$app->user->identity->fullname ?></h5>
				</div>
			</div>
			<hr>
			<p class="text-secondary"><?= strip_tags($item->body) ?></p>
		</a>
	</div>
	<?php } ?>
</div>

<?php

echo LinkPager::widget([
	'pagination' => $pagination,
]);

?>