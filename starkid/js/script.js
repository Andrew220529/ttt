$(function () {
    /* フェードイン表示 */
    $(window).on('scroll load', function (i) {
        var scTop = $(this).scrollTop();
        var scBottom = scTop + $(this).height();
        $('.inview').each(function (i) {
            var thisPos = $(this).offset().top + 100;
            if (thisPos < scBottom) {
                $(this).addClass('animate');
            }
        });
        $('.inview_group').each(function (i) {
            var thisPos = $(this).offset().top + 100;
            if (thisPos < scBottom) {
                $(".animate_item", this).each(function (i) {
                    $(this).delay(i * 300).queue(function (next) {
                        $(this).addClass('animate');
                        next();
                    });
                });
            }
        });
    });

    $('a[href^="#"]').click(function () {
        var headerHeight = $header.innerHeight();
        var speed = 500;
        var href = $(this).attr("href");
        var target = $(href == "#" || href == "" ? 'html' : href);
        var position = target.offset().top - headerHeight;
        $('body,html').animate({ scrollTop: position }, speed);
        return false;
    });

    var pagetop = $('#js-pagetop'),
        $header = $('.head'),
        headerHeight = $header.innerHeight();
    pagetop.hide();
    $(window).scroll(function () {
        if ($(this).scrollTop() > headerHeight) {
            pagetop.fadeIn();
        } else {
            pagetop.fadeOut();
        }
        scrollHeight = $(document).height();
        scrollPosition = $(window).height() + $(window).scrollTop();
        footHeight = $("footer").innerHeight();
        if (scrollHeight - scrollPosition <= footHeight) {
            pagetop.css({
                "position": "absolute",
                "bottom": footHeight + 24
            });
        } else {
            pagetop.css({
                "position": "fixed",
                "bottom": "5%"
            });
        }
    });
    pagetop.click(function () {
        $('body, html').animate({ scrollTop: 0 }, 500);
        return false;
    })
    $('#zoom-no').click(function () {
        $('.radio_choice').css('display', 'none');
    })
    $('#zoom-yes').click(function () {
        $('.radio_choice').css('display', 'block');
    })
    /* 途中ヘッダー固定 */
    var $header = $('.head'),
        $fv = $('.fv'),
        fvHeight = $fv.innerHeight(),
        headerPos = $header.offset().top,
        fixedClass = 'is-fixed',
        showClass = 'is-show';

    $(window).on('load scroll', function () {
        var value = $(this).scrollTop();
        if (value > headerPos) {
            $header.addClass(fixedClass);
        } else {
            $header.removeClass(fixedClass);
        }
        if (value > fvHeight) {
            $header.addClass(showClass);
        } else {
            $header.removeClass(showClass);
        }
    });
});