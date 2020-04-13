<?php $title = 'Top bikes'; $menu = 'bikes'; ?>
<?php ob_start(); ?>

<div class="row text-center fill">
	<h1>About</h1>
</div>

<div class="aboutContainer">
      <div class="location">
        <h2>Location</h2>
        <img src="" alt="Maps">
      </div>

      <div class="info">
        <h2>Address</h2>
        <p>4 rue du cul</p>
        <p>12345 aergqsev</p> <br>
        <h2>Opening hours</h2>
        <p>-Mon-Fri : 9AM - 6PM<br>- Sat : 2PM - 5PM</p><br>
        <h2>Phone number</h2>
        <p>(+33) 6 12 34 56 78</p>
      </div>
    </div>

<?php $content = ob_get_clean(); ?>
<?php require('view/template.php'); ?>