<?php $title = 'Home'; $menu = 'home'; ?>
<?php ob_start(); ?>

<div class="row text-center fill">
	<h1>Pimp My Bike</h1>
</div>

<div id="carouselHome" class="carousel slide" data-ride="carousel">
	<div class="carousel-inner">
		<div class="carousel-item active">
			<img src="../include/images/bike2.png" alt="Bike workshop">
			<div>
        <h2>You gotta pimp my bike !</h2>
        <p>zdfpoi zefopi efioj oeipfopizgfioqdv oidv   zdiofiozdf zzF</p>
      </div>
		</div>
		<div class="carousel-item">
			<img src="../include/images/bike3.png" alt="Wild bike">
			<div>
        <h2>Unlimited personalization !</h2>
        <p>zerohdfji poaze aizj e jzepj azejp ioj piogjoizf kdfj</p>
      </div>
		</div>
		<div class="carousel-item">
			<img src="../include/images/bike1.png" alt="Mountain bike">
			<div>
        <h2>You gotta pimp my bike !</h2>
				<p>C'EST LA TROISIEME SLIDE TA MERE</p>
      </div>
		</div>
	</div>
	<a class="carousel-control-prev" href="#carouselHome" role="button" data-slide="prev">
		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="carousel-control-next" href="#carouselHome" role="button" data-slide="next">
		<span class="carousel-control-next-icon" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	</a>
</div>

<?php $content = ob_get_clean(); ?>
<?php require('view/template.php'); ?>
