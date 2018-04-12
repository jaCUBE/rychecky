<nav class="navbar navbar-expand-md navbar-dark bg-dark">
  <a class="navbar-brand" href="<?= URL ?>">JR</a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <?php foreach(Menu::generateMenu() as $url => $button){ // Procházení jednotlivých tlačítek... ?>
        <li class="nav-item <?= Menu::isMenuSelected($url) ? 'active' : '' // Zvýraznění zvoleného ?>">
          <a href="<?= URL.'/'.$url ?>">
            <i class="fa <?= $button['icon'] // Ikona via Font Awesome ?>"></i>
            <?= $button['name'] // Název tlačítka ?>
          </a>
        </li>
      <?php } ?>
    </ul>
  </div>
</nav>