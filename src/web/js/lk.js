$('.remove_mess').on('click', function () {
    var d = $(this).parents('.inbox-item');
    $.ajax({
        url: '/lk/remmess',
        data: {
            id: $(this).attr('data')
        },
        type: 'GET',
        success: function (res) {
            if(!res) console.log('ошибка');
            d.hide(300);
        },
        error: function (res) {
            console.log('Ошибка связи');
            console.log(res);
        }
    });

});