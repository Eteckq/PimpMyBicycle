<?php $title = 'Home'; $menu = 'home'; ?>
<?php ob_start(); ?>

<div class="row text-center fill">
	<h1>Pimp My Bike</h1>
</div>

<?php $content = ob_get_clean(); ?>
<?php require('view/template.php'); ?>