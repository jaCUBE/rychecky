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
        
        <li class="">
          <a href="javascript:void(0)" onclick="$('.locale-switcher').submit()">
            <img src="<?= URL ?>/images/flags/<?= e('gb.png', 'cz.png') ?>" style="margin-right: 5px;" alt="" />
            <?= e('English', 'Česky') ?>
          </a>
        </li>
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
  <?php if(LOCALE == 'en'){ // Upozornění na dočasnou anglickou verzi ?>
  <div class="alert alert-warning">
    <i class="fa fa-globe"></i>
    The English version is currently under development and there are still Czech texts here and there. I apologize, I'm working on that.
  </div>
<?php } ?>