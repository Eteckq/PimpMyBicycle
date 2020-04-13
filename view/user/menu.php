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
    <li class="nav-item <?= $menu == 'preview' ? "active" : "" ?>">
      <a class="nav-link" href="/?page=preview">Editor</a>
    </li>
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
      <a class="btn btn-outline-dark" href="#" onclick="destroy()" role="button">Logout</a>
    </li>
  </ul>
</div>

<script>
  function destroy() {
    document.cookie = 'PHPSESSID=; expires=Thu, 01-Jan-70 00:00:01 GMT;';
    document.location = '/'
  }
</script>