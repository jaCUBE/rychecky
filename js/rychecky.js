var host = window.location.hostname; // Adresa E2
var relative_path = '/'; // Základní relativní cesta  


$(function(){
  if($('.portfolio').length > 0){
    initialize_isotope();
  }
  
  if(host == 'localhost'){
    relative_path = '/rychecky/';
  }
  
  
  
  $('.btn-social').tipsy({ // Inicializace jQuery Tipsy (tooltipy)
    html: true,
    fade: true,
    offset: 3,
    opacity: 1.0
  });
  
  
  if($('#experiences-timeline').length > 0){
    experiences_timeline();
  }
  
  if($('#certificate-timeline').length > 0){
    certificate_timeline();
  } 
  
  $('.fancybox').fancybox({
    overlayColor: '#FFF',
    helpers: {
      title: {
        type: 'over'
      }
    }
  });
  
  if($('#gmap-iframe').length > 0){
    gmap_resize();
    $(window).resize(gmap_resize);
  }
});





function portfolio(portfolio_id){
  
  var modal = $('#portfolio-modal');
  
  $.ajax({
    type: 'GET',
    url: relative_path+'ajax_portfolio.php',
    data: {
      'portfolio_id': portfolio_id
    },
    success: function(data, textStatus, xhr) {
      var obj = $.parseJSON(data);
      
      modal.find('.modal-title').html(obj.title);
      modal.find('.modal-body').html(obj.body);
    }
  });
  
  
  modal.modal('show');
}






function initialize_isotope(){
  var $container = $('.isotope').isotope({
    itemSelector: '.portfolio',
    layoutMode: 'fitRows',
    getSortData: {
      name: '[data-name]',
      age: function(item){
        return parseInt($(item).data('age'));
      },
      size: function(item){
        return parseInt($(item).data('size'));
      },
    }
  });
  
  
  
  // filter functions
  var filterFns = {};
  
  
  
 // bind filter button click
  $('#filters .btn').click(function() {
    var filterValue = $(this).attr('data-filter');
    // use filterFn if matches value
    filterValue = filterFns[ filterValue ] || filterValue;
    $container.isotope({ filter: filterValue });
    
    $(this).closest('.btn-group').find('.btn').removeClass('btn-success');
    $(this).addClass('btn-success');
  });



  // bind sort button click
  $('#sorts .btn').click(function() {
    var sortByValue = $(this).attr('data-sort-by');
    $container.isotope({ sortBy: sortByValue });
  });
  
  
  $('#filters .btn, #sorts .btn').click(function(){
    $(this).closest('.btn-group').find('.btn').removeClass('btn-success');
    $(this).closest('.btn-group').find('.btn').addClass('btn-default');
    
    $(this).removeClass('btn-default');
    $(this).addClass('btn-success');
  });
}



function experiences_timeline(){
  $.ajax({ // Přebírání informací přes AJAX
    type: 'GET',
    url: relative_path+'ajax_experiences.php', // Dotazované URL
    datatype: 'json', // JSON výstup
    success: function(data, textStatus, xhr) {
      var timeline_data = $.parseJSON(data); // Parsování JSON do JS array
      console.log(timeline_data);
      var timeline = new Timeline($('#experiences-timeline'), timeline_data);
      
      timeline.setOptions({
        animation:   true, // Animovaná timeline?
        lightbox:    true, // Lightbox jako prohlížeč fotek?
        allowDelete: true, // Povolit skrývání událostí?
        separator:   'month_year', // Oddělovač timeline
        columnMode:  'dual', // Počet sloupců
        order:       'desc', // Pořadí událostí
        defaultElementWidth: 250 // Šířka události
      });
      
      timeline.display(); // Zobrazení timeline
    }
  });
}


function certificate_timeline(){
  $.ajax({ // Přebírání informací přes AJAX
    type: 'GET',
    url: relative_path+'ajax_certificate.php', // Dotazované URL
    datatype: 'json', // JSON výstup
    success: function(data, textStatus, xhr) {
      var timeline_data = $.parseJSON(data); // Parsování JSON do JS array

      var timeline = new Timeline($('#certificate-timeline'), timeline_data);
      
      timeline.setOptions({
        animation:   true, // Animovaná timeline?
        lightbox:    true, // Lightbox jako prohlížeč fotek?
        allowDelete: true, // Povolit skrývání událostí?
        separator:   'month_year', // Oddělovač timeline
        columnMode:  'dual', // Počet sloupců
        order:       'desc', // Pořadí událostí
        defaultElementWidth: 250 // Šířka události
      });
      
      timeline.display(); // Zobrazení timeline
    }
  });
}


function gmap_resize(){
  var c = $('#content');
  var gm = $('#gmap-iframe');
  
  var css = {
    'width': c.css('width'),
    'margin-left': '-'+c.css('padding-left'),
    'margin-bottom': '-'+c.css('padding-bottom')
  }
  
  gm.css(css);
}