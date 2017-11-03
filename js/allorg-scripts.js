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

});