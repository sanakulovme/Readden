<?php

/** @var yii\web\View $this */

$this->title = $title;

use yii\bootstrap5\LinkPager;

?>

<?php if (empty($posts)): ?>
    <div class="display-6 text-center opacity-50">Malumot topilmadi!</div>
<?php else: ?>
    <h4>Biz jami <span class="text-primary"><?= $count ?></span> ta natija topdik.</h4>
<?php endif ?>
<div class="row pt-5">
    <?php
    foreach ($posts as $item) { ?>
        <div class="col-12 col-md-6 p-3" style="position: relative;">
        <a href="#" class="text-decoration-none border border-1 d-block p-3 rounded-2 shadow-sm bloc-col scrol-no" style="height: 250px; overflow-y: auto;">
            <div class="row align-items-center">
                <img src="/images/uploads/Default_Prsofile_Picture.png" class="col-2 mb-md-0 mb-3" alt="">
                <div class="col-12 col-md-10 my-md-3">
                    <h5><?= $item->author->fullname ?></h5>
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