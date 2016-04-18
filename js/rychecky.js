var host = window.location.hostname; // Adresa E2
var relative_path = '/'; // Základní relativní cesta  


$(function(){
  if($('.portfolio').length > 0){
    initialize_isotope();
  }
  
  if(host == 'localhost'){
    relative_path = '/rychecky/';
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