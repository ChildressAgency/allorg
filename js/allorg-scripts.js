jQuery(document).ready(function($){

  //header search animations
  $('.ico-search').on('click', function(e){
    e.preventDefault();
    $('.header-search-form').show('fast', 'linear');
  });
  $('.dismiss-search-form').on('click', function(){
    $('.header-search-form').hide('fast', 'linear');
  });
  $(document).mouseup(function(e){
    var container = $('.header-search-form');
    if(!container.is(e.target) && container.has(e.target).length ===0){
      container.hide('fast', 'linear');
    }
  });
  
});