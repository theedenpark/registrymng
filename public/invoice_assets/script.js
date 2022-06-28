$('#eye').click(function(){
    $(this).toggleClass('fa-eye-slash fa-eye');
    var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
});

//active
$(function(){
    var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
     $('.nav__list ul li a').each(function() {
      if (this.href === path) {
       $(this).addClass('active');
      }
     });
})

//Toggle Sidebar
$('#toggleBtn').click(function(){
    $('.side__bar').toggle(function(){
        $('.bodyDash').toggleClass('col-lg-10 col-lg-12');
    });
    $(this).children().toggleClass('fa-arrow-right fa-lines-leaning');
});

//View Details
function viewDetails(id, format, receipt, date, pname, sname, plot, email, mobile, address, phase, units, amount, words, payment_desc, size, gen_date)
{
    $('.modal__Overlay').fadeIn();
    $('.my__Modal').fadeIn();

    //send Details
    if(sname != "")
    {
        $('#username').html(sname);
    }
    else
    {
        $('#username').html(pname);
    }
    $('#receipt_no').html(format+receipt);
    $('#receipt_date').html('Receipt Date: '+date);
    $('#email').html('<i class="fa-solid fa-envelope"></i> '+email);
    $('#phone').html('<i class="fa-solid fa-phone-alt"></i> '+mobile);
    $('#phase').html('<i class="fa-solid fa-mountain-city"></i> The Ewen Park - '+phase);
    $('#plot').html('<i class="fa-solid fa-map-location-dot"></i> '+plot + ' Plot No.');
    $('#size').html('<i class="fa-solid fa-ruler-combined"></i> '+size+ ' Sq.Yards');
    $('#address').html('<i class="fa-solid fa-address-card"></i>&nbsp; '+address);
    $('#amount').html('₹'+amount);
    $('#words').html(words+' Rupees Only');
    $('#desc').html(payment_desc);
    $('#download').html('<a href="/receipt/all/print?id='+id+'" target="_blank"> <button class="btn btn-link btn-floating shadow-0"> <i class="fa-solid fa-download"></i> </button> </a>');
}

function close_my__Modal()
{
    $('.my__Modal').fadeOut();
    $('.modal__Overlay').fadeOut();
}


$('#listCustomers').on('click', '#user', function() {
    // $('#user div.active').removeClass('uactive');
    $(this).addClass('uactive');
    $(this).siblings().removeClass('uactive');
});


function getDetails(mobile)
{
    $.ajax({
        type: "GET",
        url: '/receipt/getDetails',
        data: {
            mobile: mobile
        },
        success: function(response){
            if(response != false)
            {
                $('#customerDetails').html(response);
            }
        }
    });
}

$("#myinput").keyup(function() {

    var filter = $(this).val(),
    count = 0;

    $('#listCustomers div').each(function() {

      if ($(this).text().search(new RegExp(filter, "i")) < 0)
      {
        $(this).hide(); 
      } 
      else 
      {
        $(this).show();
        count++;
      }
    });
});

//get random avatar
$('.avatar').each(function() {
    var num = Math.floor(Math.random() * 10 + 1),
    img = $(this);
    img.attr('src', 'https://avatars.dicebear.com/api/micah/:' + num + '.svg');
    img.attr('alt', 'Src: ' + img.attr('src'));
});

function searchChat(input)
{
    console.log();
    var search_term = input;
    $('.userChat').removeHighlight().highlight(search_term);
}

//collapse under chat
// function showDetails(sn)
// {
//     // $(sn).parent().siblings().slideToggle();
//     $(sn).siblings().slideToggle();
//     $(sn).children().find('i').toggleClass('fa-chevron-down fa-chevron-up');
// }