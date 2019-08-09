$(document).ready(function () {
    // post ajax
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#post-frm').on('submit', function () {
        event.preventDefault();
        // post data
        $.ajax({
                url: "/",
                method: 'post',
                dataType: 'json',
                data: {
                    title: $("input[name=title]").val(),
                    description: $("#description").val(),
                    category_id: $("#category_id").val()
                },
                success: function (response) {
                    console.log(response);
                },
            })
            .fail(function (error) {
                console.log(error);
            })
    });
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
    // if( $("#img-post").prop("files").length !== 0 ){
    //     console.log("no files selected");
    // }else{
    //     $(".form-post").append('<div class="img mb-2"><img src="'+ $('#img-post').val() + '" class="img-thumbnail"></div>');
    // }
});
