<?php
use yii\bootstrap5\LinkPager;
$this->title = "Blogs";

?>


<div class="display-6 text-center pt-5">So'nggi bloglar</div>

<div class="row pt-5">
	<?php foreach ($posts as $item): ?>
		<div class="col col-lg-4 p-3">
		<a href="/blog/<?= $item->token ?>" class="text-decoration-none border border-1 d-block p-3 rounded-3 scrol-no" style="height: 250px; overflow-y: auto;">
			<div class="row align-items-center">
				<img src="/images/uploads/Default_Prsofile_Picture.png" class="col-3" alt="">
				<div class="col-9">
					<h5><?= $item->author->fullname ?></h5>
				</div>
			</div>
			<hr>
			<p class="" style="word-break: break-all;">
				<?= $item->body ?>
			</p>
		</a>
	</div>
	<?php endforeach ?>
</div>

<?php

echo LinkPager::widget([
	'pagination' => $pagination,
]);


?>