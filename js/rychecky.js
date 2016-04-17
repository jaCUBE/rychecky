


$(function(){
  
  if($('.portfolio').length > 0){
    initialize_isotope();
  }


});




function initialize_isotope(){


  var $container = $('.isotope').isotope({
    itemSelector: '.portfolio',
    layoutMode: 'fitRows',
    getSortData: {
      name: '[data-name]',
      age: '[data-age]',
      size: '[data-size]'
    }
  });
  
  // filter functions
  var filterFns = {
    // show if number is greater than 50
    numberGreaterThan50: function() {
      var number = $(this).find('.number').text();
      return parseInt( number, 10 ) > 50;
    },
    // show if name ends with -ium
    ium: function() {
      var name = $(this).find('.name').text();
      return name.match( /ium$/ );
    }
  };
  
  
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