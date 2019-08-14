$('body').css('overflow', 'hidden');
$(document).ready(function () {
    // hide loading
    $(window).on('load', function () {
        setTimeout(function () {
            $('.loading').fadeOut();
        }, 2500);
        $('body').css('overflow', 'auto');
    });
    // post ajax
    // $.ajaxSetup({
    //     headers: {
    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //     }
    // });
    // $('#likable').on('submit', function () {
    //     event.preventDefault();
    //     // post data
    //     $.ajax({
    //             url: "/blog/{{$post->id}}/likes",
    //             method: 'post',
    //             dataType: 'json',
    //             success: function (response) {
    //                 console.log(response);
    //             },
    //         })
    //         .fail(function (error) {
    //             console.log(error);
    //         })
    // });
    //display category on select
    $('.tags').hide();
    $('#category_id').change(function () {
        $('.tags').slideDown().html($('#category_id option:selected').text());
    });
    // dark mode
    $('.change-color').on('click', function () {
        $('body').toggleClass('dark-body');
        $('#navbar').toggleClass('navbar-dark bg-dark');
        $('.content').toggleClass('dark-content');
        if ($('.change-color').html() === '<img src="/img/sun.svg" width="40">') {
            $('.change-color').html('<img src="/img/moon.svg" width="40">');
        } else {
            $('.change-color').html('<img src="/img/sun.svg" width="40">');
        }
    });
    // check if file select
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#img').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#img-post").change(function () {
        $('.img').show();
        readURL(this);
    });
    $('.close').click(function () {
        $('.img').hide();
        $('#img-post').val('');
    });
    // list
    $('.information').hide();   
    
    $(".info").on('click', function () {
        // remove classes from all
        $(".info").removeClass("active");
        // add class to the one we clicked
        $(this).addClass("active");
        // check
        if($('.post').hasClass('active')){
            $('.posts').slideDown();
            $('.information').hide();        
        }else{
            $('.information').slideDown();
            $('.posts').hide();            
        }
    });
    $('.lni-angle-double-down').on('click',function(){
        $('.navbar-toggler').toggleClass('rotate');
    });
});
