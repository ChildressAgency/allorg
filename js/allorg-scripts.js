/*
 Normalize Carousel Heights - pass in Bootstrap Carousel items. https://coderwall.com/p/uf2pka/normalize-twitter-bootstrap-carousel-slide-heights
*/
$.fn.carouselHeights = function () {
  var items = $(this), //grab all slides
    heights = [], //create empty array to store height values
    tallest; //create variable to make note of the tallest slide

  var normalizeHeights = function () {
    items.each(function () { //add heights to array
      heights.push($(this).height());
    });
    tallest = Math.max.apply(null, heights); //cache largest value
    items.each(function () {
      $(this).css('min-height', tallest + 'px');
    });
  };

  normalizeHeights();

  $(window).on('resize orientationchange', function () {
    //reset vars
    tallest = 0;
    heights.length = 0;

    items.each(function () {
      $(this).css('min-height', '0'); //reset min-height
    });
    normalizeHeights(); //run it again 
  });
};

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

  //carousel swipe navigation
  if (typeof $.fn.swiperight == 'function') {
    $('.carousel.slide').swiperight(function () {
      $(this).carousel('prev');
    });
    $('.carousel.slide').swipeleft(function () {
      $(this).carousel('next');
    });
  }

  //leadership modal
  $('#leadershipModal').on('show.bs.modal', function(e){
    var member = $(e.relatedTarget);
    var memberName = member.data('member_name');
    var memberTitle = member.data('member_title');
    var memberImage = member.data('member_image');
    var memberBio = member.data('member_bio');

    var modal = $(this);
    modal.find('.member-image').attr('src', memberImage);
    modal.find('.member-name').text(memberName);
    modal.find('.member-title').text(memberTitle);
    modal.find('.member-bio').html(memberBio);
  });
  //clear modal fields for next open
  $('#leadershipModal').on('hidden.bs.modal', function(){
    var modal = $(this);
    modal.find('.member-image').attr('src', '');
    modal.find('.member-name').empty();
    modal.find('.member-title').empty();
    modal.find('.member-bio').empty();
  });

  //timeline
  $(window).on('scroll', function(){
    $('.timeline-event').each(function(){
      var bottom_of_row = $(this).offset().top + $(this).outerHeight(false);
      var bottom_of_window = $(window).scrollTop() + $(window).height() + 150;

      if(bottom_of_window > bottom_of_row){
        $(this).addClass('fadein');
      }
      else{
        $(this).removeClass('fadein');
      }
    });
  });

  $('#creation-carousel .carousel-inner .item').carouselHeights();

  //alpha-nav smooth scroll
  $('.alpha-nav>ul>li>a, back-to-top').on('click', function (e) {
    e.preventDefault;
    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top - 40
        }, 1000);
        return false;
      }
    }
  });  

});