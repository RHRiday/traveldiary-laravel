// forms animation
var hiders = $('h1, .search-btn, .navbar-toggler');
var windowSize = $(window).height();
$('#signup-btn').on('click', function () {
    $('#login-form').slideUp('slow');
    $('#signup-form').slideDown('slow');
    if(windowSize < 700){
        hiders.hide('slow');
    }
});
$('#login-btn').on('click', function () {
    $('#signup-form').slideUp('slow');
    $('#login-form').slideDown('slow');
    if(windowSize < 700){
        hiders.show('slow');
    }
});
$('.js--com').on('click', function () {
    $('#signup-btn').click();
    $('input[name=fName]').focus();
});
// scroll animation 
$('a').click(function(e){
    if(this.hash !== ""){
        e.preventDefault();
        var hash = this.hash;
        $('html, body').animate({
            scrollTop: $(hash).offset().top - 100
        }, 500, function(){
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

//following ajax
$('[data-type=follow]').each(function(index){
    $(this).on('click', function(){
        var status = $(this).html();
        var id = $(this).val();
        var self = $(this).data('self');
        var ref = $(this).data('ref');
        if(ref==='profile'){
            var url = "../handlers/ajax.handle.php";
        }else{
            var url = "handlers/ajax.handle.php"
        }
        $.post(url,{
            req: id,
            user: self
        },function(data, status){
            $('.search').val(data);
        });
        if(status === 'Follow'){
            $(this).html('Unfollow');
        }else{
            $(this).html('Follow');
        }
        console.log(self);
    });
});

//zooming images
mediumZoom('.zoom', {
  margin: 20,
  scrollOffset: 500,
  background: '#000000d9'
});

$(document).ready(function() {

    $("input[type='radio']").on('click', function() {
        var sim = $("input[type='radio']:checked").val();
        $("input[type='number']").val(sim);
        //alert(sim);
        if (sim < 3) {
            $('.myratings').css('color', 'red');
            $(".myratings").text(sim);
        } else {
            $('.myratings').css('color', 'green');
            $(".myratings").text(sim);
        }
    });
});