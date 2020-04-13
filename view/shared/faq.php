<?php $title = 'FAQ'; $menu = 'faq'; ?>
<?php ob_start(); ?>


<div class="faq">
<h2>Frequently asked questions :</h2>
  <div class="card">
    <div class="card-header0">
      How to ride ?
    </div>
    <div class="card-body">
      <p class="card-text">Put your ass on the bike</p>
    </div>
  </div>

  <div class="card">
    <div class="card-header1">
      Is the paint edible ?
    </div>
    <div class="card-body">
      <p class="card-text">Why don't you try first and tell me ?</p>
    </div>
  </div>

  <div class="card">
    <div class="card-header2">
      Will my bike go faster ?
    </div>
    <div class="card-body">
      <p class="card-text">No</p>
    </div>
  </div>

  <div class="card">
    <div class="card-header3">
      Will I get a ticket if my bicycle is blue ?
    </div>
    <div class="card-body">
      <p class="card-text">Yes, and the corona</p>
    </div>
  </div>
</div>

<?php $content = ob_get_clean(); ?>
<?php require('view/template.php'); ?>