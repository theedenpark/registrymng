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
function viewDetails(id, format, receipt, date, name, plot, email, mobile, address, phase, units, amount, words, payment_desc, size, gen_date)
{
    $('.modal__Overlay').fadeIn();
    $('.my__Modal').fadeIn();

    //send Details
    $('#username').html(name);
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

    console.log(payment_desc);
}

function close_my__Modal()
{
    $('.my__Modal').fadeOut();
    $('.modal__Overlay').fadeOut();
}



// function printDiv() 
// {

//   var divToPrint=document.getElementById('invoice').innerHTML;

//   var newWin=window.open('','Print-Window');

//   newWin.document.open();

//   newWin.document.write('<html><link href="/bootstrap/css/mdb.min.css" rel="stylesheet" /><link rel="stylesheet" href="/invoice_assets/style.css"><body onload="window.print()">'+divToPrint+'</body></html>');

//   newWin.document.close();
// }
