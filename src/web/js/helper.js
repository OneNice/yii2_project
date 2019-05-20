$('window').on("resize", resize);
resize();
function resize() {
   $('.tops').css("height", $('.tops').outerWidth()*0.33);
};
$('.tops').slick(
    {
        dots: true,
        arrows: false
    }
);

$('.success_message, .error_message').on('click', function () {
    $(this).hide(300);
});
$(window).on('load', function () {
    if($(document).height() <= $(window).height())
    {
        console.log(document.body.offsetHeight  , $(window).height());
        $('footer').addClass('fixed');
    }
});

$(document).on('scroll', function(){
    if($('html').scrollTop()>80)
    {
        $('nav .menu_fixed:not(.active)').addClass('active');
    }
    else{
        $('nav .menu_fixed').removeClass('active');
    }
});
$('header ul li, nav ul li').on('click', function () {
    console.log(1);
    var top = $('h3.category[data='+$(this).attr('data')+']').offset().top - 36;
    $('body,html').animate({scrollTop: top}, 1500);
});
$('.cart').on('click', function () {
   $('body').toggleClass('cart_active');
   $('header').toggleClass('cart_active');
   $('.cart_push').toggleClass('active');
});
$.ajax({
    url: '/cart/getall',
    success: function (res) {
        if(!res) console.log('ошибка');
        else {
            $('.cart_bottom span, .avgQty span').html(
                JSON.parse(res).qty
            );
            $('.cart_top span, .avgSum span').html(
                JSON.parse(res).sum
            );
            $('.cart_bottom, .cart_top').fadeIn(300);
            $('.my_cart').html(JSON.parse(res).html);

        }
    },
    error: function (res) {
        console.log('Ошибка связи');
        console.log(res);
    }
});
$('.sel_dough, .sel_size').on('change', function () {
    var selectSize = $(this).parents('article').find('option[value="'+ $(this).parents('article').find('.sel_size').val() + '"]');
    var selectDough = $(this).parents('article').find('option[value="'+ $(this).parents('article').find('.sel_dough').val() + '"]');
    var price = $(this).parents('article').find('button').attr('datapriceorig');
    $(this).parents('article').find('button').attr('dataprice', price * selectSize.attr('datak') * selectDough.attr('datak'));
    $(this).parents('article').find('.price').html(price * selectSize.attr('datak') * selectDough.attr('datak') + ' руб.');

});
$('article button').on('click', function (e) {
    e.preventDefault();
    var dough = $(this).parents('.additional').find('.sel_dough').val(),
        size = $(this).parents('.additional').find('.sel_size').val(),
        modify = null;
    if(dough && size) modify = {
        'size': size,
        'dough': dough,
    }
    console.log(modify);
    $.ajax({
        url: '/cart/add',
        data: {
            id: $(this).attr('data'),
            modify: modify
        },
        type: 'GET',
        success: function (res) {
            if(!res) console.log('ошибка');
            else {
                $('.cart_bottom span, .avgQty span').html(
                    JSON.parse(res).qty
                );
                $('.cart_top span, .avgSum span').html(
                    JSON.parse(res).sum
                );
                $('.my_cart').html(JSON.parse(res).html);
            }
        },
        error: function (res) {
            console.log('Ошибка связи');
            console.log(res);
        }
    });
});
$('[data-plugin="switchery"]').each(function (idx, obj) {
    new Switchery($(this)[0], $(this).data());
});

if($('.form-group.errosr').length != 0) {
    var data = $('.form-group.errosr').parent().parent().attr('data');
        swal({
            title: 'Оформление заказа!',
            html: $('.' + data).html(),
            showConfirmButton: false,
            showCloseButton: true,
        })
}
$('.goOrd2').click(function () {
    if($(this).attr('data') != null){
        swal({
            title: 'Оформление заказа!',
            html: $('.' + $(this).attr('data')).html(),
            showConfirmButton: false,
            showCloseButton: true,
        })
    }
    else {
        if ($('.oneClick input').prop('checked')) {
            swal({
                title: 'Оформление заказа!',
                html: $('.form_one').html(),
                showConfirmButton: false,
                showCloseButton: true,
            })
        }
        else {
            swal({
                title: 'Оформление заказа!',
                html: $('.form_register').html(),
                showConfirmButton: false,
                showCloseButton: true,
            })
        }
    }
});

var $container = $('.pizza_container');
$container.isotope({
    filter: '*',
    animationOptions: {
        duration: 750,
        easing: 'linear',
        queue: false
    }
});
// $('li.before').css({
//     'left': $('.onRight ul li.active').position().left - 5,
//     'width': $('.onRight ul li.active').outerWidth()+10,
// });
$('.onRight ul li').click(function(){
    $(this).toggleClass('active');
    var mass = [];

    $('.onRight ul li.active').each(function(i,elem) {
        mass.push($(this).attr('data'));
    });

    if(mass.length == 0) {
        mass = [1];
        $('.onRight ul li').eq(0).toggleClass('active');
    }
    // $('li.before').css({
    //     'left': $(this).position().left - 5,
    //     'width': $(this).outerWidth()+10,
    // });

    $container.isotope({
        filter: function() {
            if(mass[0] == 1) return true;
            if(mass.indexOf($(this).attr('datatype'))==-1) return false;
            return true;
        },
        stagger: 30,
        transitionDuration: '0.6s',
        resize: false,
        animationOptions: {
            easing: 'linear',
            queue: false
        }
    });
    return false;
});