<h1>
  Jakub Rychecký
</h1>

<div class="lead">
  <i class="fa fa-code"></i> <?= Rychecky::title() ?>
</div>




<nav class="navbar navbar-expand-md navbar-dark bg-dark">
  <a class="navbar-brand" href="<?= URL ?>">JR</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
        <?php $menu = new Menu(); ?>
        
        
        <?php foreach($menu->menu_item_list as $item){ ?>
          <?= $item->htmlMenuItem() ?>
        <?php } ?>
    </ul>
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