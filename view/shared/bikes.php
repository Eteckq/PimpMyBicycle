<?php $title = 'Shop'; $menu = 'bikes'; ?>
<?php ob_start(); ?>

<style>
	.render {
		border: solid 1px black;
	}

	.bikeRender {
		margin: 10px 50px;
		max-width: 420px;
	}

	.footer {
		border: solid 1px black;
	}
</style>

<div class="container">
	<?php foreach($bikes as $bike){ ?>

	<div class="container bikeRender">
		<div class="render">
			<iframe src="/?page=preview&id=<?= $bike->id ?>&action=viewBike" frameborder="0" width="410px" height="330px"></iframe>
		</div>
		<div class="footerbike p-2">
			<a href="" class="btn btn-warning">Add to cart</a>
			<span class="badge badge-success"><?=$bike->likes ?> likes</span>
			<span class="badge badge-info"> by <?=$bike->user_id ?></span>
		</div>
	</div>

	<?php } ?>


</div>



<?php $content = ob_get_clean(); ?>
<?php require('view/template.php'); ?>
