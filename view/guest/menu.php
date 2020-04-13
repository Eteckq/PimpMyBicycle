<?php
if(!isset($menu)){
  $menu = "";
}
?>

<div class="collapse navbar-collapse" id="navbar">
  <ul class="navbar-nav mr-auto">
    <a class="navbar-brand" href="#">
      <img src="/include/images/logo.png" width="150" height="80" alt="">
    </a>
    <li class="nav-item <?= $menu == 'bikes' ? "active" : "" ?>">
      <a class="nav-link" href="/?page=bikes">Top</a>
    </li>
    <li class="nav-item <?= $menu == 'about' ? "active" : "" ?>">
      <a class="nav-link" href="/?page=about">About us</a>
    </li>
    <li class="nav-item <?= $menu == 'faq' ? "active" : "" ?>">
      <a class="nav-link" href="/?page=faq">Q&A</a>
    </li>
    <li class="nav-item">
    <a class="btn btn-outline-light" href="/?page=login" role="button">Login</a>
    </li>
  </ul>
</div>