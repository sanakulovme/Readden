<?php

/** @var yii\web\View $this */

$this->title = 'Online Rezyumelar platformasi.';

// echo substr(str_shuffle("qwertyuiopasdfghjklzxcvbnm1234567890"), 0, 6);
?>

<div class="row justify-content-center align-items-center my-4" style="height: 50vh;">
	<div class="col col-md-7">
		<form class="" action="/search" method="get">
			<h4 class="text-center mb-3 display-6">Muammoingiz haqida qisqacha yozing.</h4>
            <div class="input-group">
                <input class="form-control form-control-lg" name="q" type="text" placeholder="Muammoni izlang" aria-label="Search">
                <button class="input-group-text px-3" type="submit">
                        <i class="fa fa-search"></i>
                </button>
            </div>
        </form>
	</div>
</div>
