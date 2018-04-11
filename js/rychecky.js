var host = window.location.hostname; // Adresa E2
var relative_path = '/'; // Základní relativní cesta


$(function(){
  if($('.portfolio').length > 0){
    initialize_isotope();
  }
  
  if(host == 'localhost'){
    relative_path = '/rychecky/';
  }
   
  $('.gallery a').fancybox(); // Fancybox pro galerii obrázků
  
  if($('#gmap-iframe').length > 0){
    gmap_resize();
    $(window).resize(gmap_resize);
  }
  
  
  
  $('.timeline .event').bind('mouseover click', timeline_type_focus);
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
  
  setTimeout(initialize_fancybox, '300');
  
}


function initialize_fancybox(){
  $('.gallery a').fancybox(); // Fancybox pro galerii obrázků
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
    
    $(this).closest('.btn-group').find('.btn').removeClass('btn-light');
    $(this).addClass('btn-light');
  });



  // bind sort button click
  $('#sorts .btn').click(function() {
    var sortByValue = $(this).attr('data-sort-by');
    $container.isotope({ sortBy: sortByValue });
  });
  
  
  $('#filters .btn, #sorts .btn').click(function(){
    $(this).closest('.btn-group').find('.btn').removeClass('btn-light');
    $(this).closest('.btn-group').find('.btn').addClass('btn-dark');
    
    $(this).removeClass('btn-dark');
    $(this).addClass('btn-light');
  });
}


function timeline_type_focus(){
  var type = $(this).data('type');
  
  $('.event').css({'opacity': 0.4});
  $(this).css({'opacity': 1.0});
  $('.event[data-type="'+type+'"]').css({'opacity': 0.9});
  
  $(this).mouseleave(function(){
    $('.event').css({'opacity': 1.0});
  });
}


function gmap_resize(){
  var c = $('#content');
  var gm = $('#gmap-iframe');
  var w = parseInt(c.css('width')) - 2;
  
  var css = {
    'width': w+'px',
    'margin-left': '-'+c.css('padding-left'),
    'margin-bottom': '-'+c.css('padding-bottom')
  }
  
  gm.css(css);
}