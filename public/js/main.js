//window loader

$(window).on('load', function(){
    $('.wait').fadeOut(500);
});

// forms animation
var hiders = $('h1, .search-btn, .navbar-toggler');
var windowSize = $(window).height();
$('#signup-btn').on('click', function () {
    $('#login-form').slideUp('slow');
    $('#signup-form').slideDown('slow');
    if (windowSize < 700) {
        hiders.hide('slow');
    }
});
$('#login-btn').on('click', function () {
    $('#signup-form').slideUp('slow');
    $('#login-form').slideDown('slow');
    if (windowSize < 700) {
        hiders.show('slow');
    }
});
$('.js--com').on('click', function () {
    $('#signup-btn').click();
    $('input[name=fName]').focus();
});
// scroll animation 
$('a').click(function (e) {
    if (this.hash !== "") {
        e.preventDefault();
        var hash = this.hash;
        $('html, body').animate({
            scrollTop: $(hash).offset().top - 100
        }, 500, function () {
            window.location.hash = hash;
        });
    }
});

// string slicing 
var names = $('.who-to-follow-name');
slicing(names, 12);

function slicing(el, len) {
    var nlen = el.length - 1;
    for (var i = 0; i < nlen; i++) {
        if (el[i].innerText.length > len) {
            var newName = el[i].textContent.slice(0, len);
            el[i].innerHTML = newName + "...";
        }
    }
}

//zooming images
mediumZoom('.zoom', {
    margin: 20,
    scrollOffset: 500,
    background: '#000000d9'
});



// places

$(function () {
    $("input[type='radio']").on('click', function () {
        var sim = $("input[type='radio']:checked").val();
        $('#rating').val(sim);
        //alert(sim);
        if (sim < 3) {
            $(".myratings").css("color", "red");
            $(".myratings").text(sim);
        } else {
            $(".myratings").css("color", "green");
            $(".myratings").text(sim);
        }
    });
});

//packages
document.addEventListener("trix-file-accept", event => {
    event.preventDefault()
});

//confidentiality
$('#book_for').on('input', function () {
    $('#total_price').val($('#book_for').val() * $('#package_price').html());
})
