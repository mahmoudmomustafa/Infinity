// $(document).ready(function () {
//     $('#post-form').on('submit', function () {
//         event.preventDefault();
//         $.ajax({
//                 url: "/",
//                 method: 'post',
//                 data: {
//                     posts: marker.getCustomData('posts'),
//                 },
//                 success: function (response) {
//                     $('#posts').html(response)
//                 },
//             })
//             .fail(function (error) {
//                 console.log(error);
//             })
//     });
// });
$(document).ready(function () {
  $('.tags').hide();
  //display category on select
  $('#category_id').change(function(){
    $('.tags').slideDown().html($('#category_id option:selected').text());
   console.log($('#category_id option:selected').text());
  });
  // dark mode
  $('.change-color').on('click',function(){
    $('body').toggleClass('dark-body');
    $('#navbar').toggleClass('navbar-dark bg-dark');
    $('.content').toggleClass('dark-content');
    if($('.change-color').html() === '<img src="/img/sun.svg" width="40">'){
      $('.change-color').html('<img src="/img/moon.svg" width="40">');
    }else{
      $('.change-color').html('<img src="/img/sun.svg" width="40">');
    }
  });
});
