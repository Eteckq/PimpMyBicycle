<?php $title = 'Top bikes'; $menu = 'bikes'; ?>
<?php ob_start(); ?>

<div class="row text-center fill">
	<h1>Liste des vélos</h1>
</div>

<div class="render">
	<iframe src="http://localhost:31313/?page=preview&id=2&action=viewBike" frameborder="0" width="410px" height="330px"></iframe>
</div>
<div class="render">
	<iframe src="http://localhost:31313/?page=preview&id=2&action=viewBike" frameborder="0" width="410px" height="330px"></iframe>
</div>

<?php $content = ob_get_clean(); ?>
<?php require('view/template.php'); ?>