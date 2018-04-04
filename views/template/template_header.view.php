<h1>
  Jakub Rychecký
</h1>

<div class="lead">
  <i class="fa fa-code"></i> <?= Rychecky::title() ?>
</div>


<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#rychecky-menu">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?= URL ?>">JR</a>
    </div>

    
    <div class="collapse navbar-collapse" id="rychecky-menu">
      <ul class="nav navbar-nav">
        <?php $menu = new Menu();
        
        foreach($menu->menu_item_list as $m){
          echo $m->htmlMenuItem();
        } ?>
      </ul>
    </div>
  </div>
</nav>


<div class="alert alert-success">
  <i class="fa fa-briefcase"></i>
  <?= e('Hledám nové pracovní příležitosti, kde bych mohl uplatnit a zlepšovat své dovednosti. Budu vděčný za všechny zajímavé nabídky. :)',
        'I seek new job opportunities to utilize and improve my skills. I will be glad for any interesting offers. :)') ?>
</div>


          
<form action="#" method="post" class="locale-switcher">
  <input type="hidden" name="locale" value="<?= e('en', 'cs') ?>" />
</form>



<main id="content">