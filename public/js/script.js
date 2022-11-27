
 
//active
$(function(){
    var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
     $('.nav__list ul li a').each(function() {
      if (this.href === path) {
       $(this).parent().addClass('active');
      }
     });
})

//revenue Village //
$(document).ready(function(){
    var stateDist = {};
    var url = "/js/locationData.json";
    
    $.getJSON(url, function (data) {
        stateDist = data;
        $('#myStates').html('<option disabled selected>Select State</option>');
        for(var i=0; i < data['states'].length; i++)
        {
            $('#myStates').append('<option value="'+ data['states'][i]['state'] +'">' + data['states'][i]['state'] + '</option>')
        }
    });

    $('#myStates').change(function(event) {
        
        $('#myDistrict').html('<option disabled selected>Select District</option>');
        for(var i=0; i < stateDist['states'].length; i++)
        {
            if($('#myStates').val() == stateDist['states'][i]['state']) {
                for(var j=0; j < stateDist['states'][i]['districts'].length; j++)
                {
                    // console.log(stateDist['states'][i]['districts'][j]);
                    $('#myDistrict').append('<option value="'+ stateDist['states'][i]['districts'][j] +'">' + stateDist['states'][i]['districts'][j] + '</option>')
                }       
            }
        }
    });
});

$('.searchAddress').click(function () {
    $('.revenueVillages').show();
});

//hide suggestions when clicked outside the input box
$(document).mouseup(function (e) {
    var container = $(".revenueVillages");

    // If the target of the click isn't the container
    if (!container.is(e.target) && container.has(e.target).length === 0) {
        container.hide();
    }
});

//filter address search
$('.searchAddress').keyup(function () {
    var valThis = $(this).val().toLowerCase();
    var filteredWord = valThis;

    if (filteredWord == "") {
        $('.revenueVillages .villageBlock').show();
        $('.revenueVillages .villageBlock').removeClass('hidden-store');
    } 
    else
    {
        $('.revenueVillages .villageBlock').each(function () {
            $('.revenueVillages .villageBlock').addClass('hidden-store');

            var text = $(this).text().toLowerCase();
            text = text;
            (text.indexOf(filteredWord) > -1) ? $(this).show(): $(this).hide();

        });
    }
});

//put village under input box (Add new Property)
function putVillage(q,a,b,c,d)
{
    $('.searchAddress').val(a +', '+ b +', '+ c +', ' + d);
    $('#village_id').val(q);
    $('.revenueVillages').hide(); 
}

//////////////////////////////////////////////////////////////////////////////
$('.searchAgent').click(function () {
    $('.agentList').show();
});
//hide suggestions when clicked outside the input box
$(document).mouseup(function (e) {
    var container = $(".agentList");

    // If the target of the click isn't the container
    if (!container.is(e.target) && container.has(e.target).length === 0) {
        container.hide();
    }
});
//filter address search
$('.searchAgent').keyup(function () {
    var valThis = $(this).val().toLowerCase();
    var filteredWord = valThis;

    if (filteredWord == "") {
        $('.agentList .agentBlock').show();
        $('.agentList .agentBlock').removeClass('hidden-store');
    } 
    else
    {
        $('.agentList .agentBlock').each(function () {
            $('.agentList .agentBlock').addClass('hidden-store');

            var text = $(this).text().toLowerCase();
            text = text;
            (text.indexOf(filteredWord) > -1) ? $(this).show(): $(this).hide();

        });
    }
});

//put village under input box (Add new Property)
function putAgent(name)
{
    $('.searchAgent').val(name);
    $('.agentList').hide();
}

/////////////////////////////////////////////////////////////////////////////
$('.searchDraftmen').click(function () {
    $('.draftList').show();
});

//hide suggestions when clicked outside the input box
$(document).mouseup(function (e) {
    var container = $(".draftList");

    // If the target of the click isn't the container
    if (!container.is(e.target) && container.has(e.target).length === 0) {
        container.hide();
    }
});

//filter address search
$('.searchDraftmen').keyup(function () {
    var valThis = $(this).val().toLowerCase();
    var filteredWord = valThis;

    if (filteredWord == "") {
        $('.draftList .draftmenBlock').show();
        $('.draftList .draftmenBlock').removeClass('hidden-store');
    } 
    else
    {
        $('.draftList .draftmenBlock').each(function () {
            $('.draftList .draftmenBlock').addClass('hidden-store');

            var text = $(this).text().toLowerCase();
            text = text;
            (text.indexOf(filteredWord) > -1) ? $(this).show(): $(this).hide();

        });
    }
});

//put village under input box (Add new Property)
function putDraftmen(name)
{
    $('.searchDraftmen').val(name);
    $('.draftList').hide();
}

// Dynamic Boxes 
$(function () {
    $("#btnAdd").bind("click", function () {
        var div = $("<tr />");
        div.html(GetDynamicTextBox(""));
        $("#TextBoxContainer").append(div);
    });
    $("body").on("click", ".remove", function () {
        $(this).closest("tr").remove();
    });
});

function GetDynamicTextBox(value) {
    return '<td><select name="pay_mode[]" required class="formFields"><option value="bank" selected>Bank</option><option value="cash">Cash</option><option value="cheque">Cheque</option><option value="demand draft">Demand Draft</option></select></td>' + '<td><input required name = "pay_mode_amount[]" type="number" value = "' + value + '" class="formFields" /></td>' + '<td><input required name = "transaction_id[]" type="text" value = "' + value + '" class="formFields" /></td>' + '<td class="text-center"><button type="button" class="btn btn-danger btn-floating shadow-none remove"><i class="fas fa-times"></i></button></td>'
}

///////////////////////////////////////////////

$(function () {
    $('#btnAddProp').click(function(){
        $('#times').prop('disabled', false);
        $("#thisIsRow").clone().insertAfter("#thisIsRow:last");
    });
});

///////////////////////////////////////////////
//add property button
$('#addPropertyBtn').click(function(){
    $a = $('#propForm').val();
    if($a != "")
    {
        $(this).html('<div class="spinner-border text-light spinner-border-sm" role="status"><span class="visually-hidden"></span></div>&nbsp;Please wait...');
    }
});

$('#collapseBtn').click(function(){
    $(this).children('i').toggleClass('fa-caret-down fa-caret-up');
    $('.myFormOverflow').slideToggle();
});

$('.modalBg').click(function(){
    $(this).fadeOut();
    $('.myModal').animate({
        right: '-35vw'
    });
    $('.result').html('<div class="p-5 text-center"><div class="spinner-border text-danger spinner-border-sm" role="status"><span class="visually-hidden"></span></div>&nbsp;Please wait...</div>');
});

function viewPropDetails(sn)
{
    $('.modalBg').show();
    $('.myModal').show();
    $('.myModal').animate({
        right: '0vw'
    });

    $.ajax({
        type: "GET",
        url: '../propDetails',
        data: {id: sn},
        success: function(response){
            $('.result').html(response);
        }
   });
}

function viewSoldPropDetails(sn)
{
    $('.modalBg').show();
    $('.myModal').show();
    $('.myModal').animate({
        right: '0vw'
    });

    var id = sn;

    $.ajax({
        type: "GET",
        url: '../soldPropDetails',
        data: {id: id},
        success: function(response){
            $('.result').html(response);
        }
   });
}

function viewCompPropDetails(sn)
{
    // $('.modalBg').show();
    // $('.myModal').show();
    // $('.myModal').animate({
    //     right: '0vw'
    // });

    var id = JSON.parse(sn);
    console.log(id);

//     $.ajax({
//         type: "GET",
//         url: '../soldPropDetails',
//         data: {id: id},
//         success: function(response){
//             $('.result').html(response);
//         }
//    });
}


// $('.searchProp').click(function () {
//     $('.allProps').show();
// });
// //hide suggestions when clicked outside the input box
// $(document).mouseup(function (e) {
//     var container = $(".allProps");

//     // If the target of the click isn't the container
//     if (!container.is(e.target) && container.has(e.target).length === 0) {
//         container.hide();
//     }
// });

// $('.searchProp').keyup(function () {
//     var valThis = $(this).val().toLowerCase();
//     var filteredWord = valThis;

//     if (filteredWord == "") {
//         $('.allProps .propBlock').show();
//         $('.allProps .propBlock').removeClass('hidden-store');
//     } 
//     else
//     {
//         $('.allProps .propBlock').each(function () {
//             $('.allProps .propBlock').addClass('hidden-store');

//             var text = $(this).text().toLowerCase();
//             text = text;
//             (text.indexOf(filteredWord) > -1) ? $(this).show(): $(this).hide();

//         });
//     }
// });

// //put property under input box (Add new Property)
// function putProperty(sn, basra, khet, name)
// {
//     $('#propID').val(sn);
//     $('.searchProp').val('Basra No. - ' + basra + ', Khet No. - ' + khet + ', ' + name);
//     $('.allProps').hide();
//     var json_data= $('#propertyArray').val();
//     var json = JSON.parse(json_data);
//     for(var i=0; i < json[i]['sn']; i++)
//     {
//         if(json[i]['sn'] == sn) {
//             $('#totalArea').val(json[i]['areaInSqft']); 
//             $('#remainingArea').val(json[i]['areaInSqft']); 
//         }
//     }
// }

$('.searchBanks').click(function () {
    $('.allBanks').show();
});
//hsne suggestions when clicked outside the input box
$(document).mouseup(function (e) {
    var container = $(".allBanks");

    // If the target of the click isn't the container
    if (!container.is(e.target) && container.has(e.target).length === 0) {
        container.hide();
    }
});

$('.searchBanks').keyup(function () {
    var valThis = $(this).val().toLowerCase();
    var filteredWord = valThis;

    if (filteredWord == "") {
        $('.allBanks .bankBlock').show();
        $('.allBanks .bankBlock').removeClass('hidden-store');
    } 
    else
    {
        $('.allBanks .bankBlock').each(function () {
            $('.allBanks .bankBlock').addClass('hidden-store');

            var text = $(this).text().toLowerCase();
            text = text;
            (text.indexOf(filteredWord) > -1) ? $(this).show(): $(this).hide();

        });
    }
});

//put village under input box (Add new Property)
function putBank(name)
{
    $('.searchBanks').val(name);
    $('.allBanks').hide();
}

$('#sellArea').keyup(function(){
    $total = $('#totalArea').val();
    $current = $(this).val();
    $remaining = $total - $current;
    $('#remainingArea').val($remaining);
});

$('#toggleSidebar').click(function(){
    $('#sidebar').toggle();
    $('.bodyOfDash').toggleClass('col-lg-12');
    $('#toggleSidebar i').toggleClass('fa-arrow-left fa-arrow-right');
});

$('.goBack').click(function(){
    $('#sidebar').hide();
});

// Add new Account Form
$("#newAccForm").submit(function(e) {
    $('#addBtn').html('<div class="spinner-border text-light spinner-border-sm" role="status"><span class="visually-hidden"></span></div>&nbsp;Please Wait');
});

$('#createBackupBtn').click(function(){
    $('.backupOptCont').slideDown();
});

$('.closeUpBtn').click(function(){
    $('.backupOptCont').slideUp();
});

$('#userButton').click(function(){
    $('.greetingOne').toggle();
    $('.greetingTwo').toggle();
})

////////////////////////////////////////////////////////////

$('.closeMe').click(function(){
    $('.modalBox').hide();
});

$('.minimize').click(function(){
    $('#sendMailToDraftment').slideToggle();
    $(this).children('i').toggleClass('fa-caret-down fa-caret-up');
});

function getmail(mailId)
{
    console.log(mailId);
    $('#searchMail').val(mailId);
    $('.allMails').hide();
}

$('#searchMail').click(function(){
    $('.allMails').show();
});

$('#searchMail').keyup(function () {
    var valThis = $(this).val().toLowerCase();
    var filteredWord = valThis;

    if (filteredWord == "") {
        $('.allMails .mailId').show();
        $('.allMails .mailId').removeClass('hidden-store');
    } 
    else
    {
        $('.allMails .mailId').each(function () {
            $('.allMails .mailId').addClass('hidden-store');

            var text = $(this).text().toLowerCase();
            text = text;
            (text.indexOf(filteredWord) > -1) ? $(this).show(): $(this).hide();

        });
    }
});

$(document).mouseup(function (e) {
    var container = $(".allMails");

    // If the target of the click isn't the container
    if (!container.is(e.target) && container.has(e.target).length === 0) {
        container.hide();
    }
});

function getDetailsForMail(sn)
{
    $('.modalBox').show();

    var id = sn;

    $.ajax({
        type: "GET",
        url: '../DetailsForMail',
        data: {id: id},
        success: function(response){
            CKEDITOR.replace( 'messageMail' );
            $('#messageMail').html(response);
        }
   });
}

$('#trash').click(function(){
    $('.cke_editable').html('Write your message here...');
});

$('#eye').click(function(){
    $(this).toggleClass('fa-eye-slash fa-eye');
    var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
});

//convert area into sq.ft.
$(document).on("keyup", ".khetArea", function() {
    var sum = 0;
    $("input[class *= 'khetArea']").each(function(){
        sum += +$(this).val();
    });
    $("#areaVal").val(sum);
});

//Multiple sellers, witness
$(function () {
    /// khet
    $('#addNewKhet').click(function(){
        var markup = $('#khetContainer').children('tr')[0].outerHTML;
        $('#khetContainer').append(markup);
    });
    $("body").on("click", ".remove", function () {
        $(this).closest("tr").remove();
    });

    /// seller
    $('#addNewSeller').click(function(){
        var markup = $('#sellerContainer').children('tr')[0].outerHTML;
        $('#sellerContainer').append(markup);
    });

    /// buyer
    $('#addNewBuyer').click(function(){
        var markup = $('#buyerContainer').children('tr')[0].outerHTML;
        $('#buyerContainer').append(markup);
    });

    /// witness
    $('#addNewWitness').click(function(){
        var markup = $('#witnessContainer').children('tr')[0].outerHTML;
        $('#witnessContainer').append(markup);
    });
});

$(document).on('keyup', '.khetArea', function () {
    $('.areaRow').each(function() {

        //get value and put value
        var area = $(this).find(".khetArea").val();
        var selectedUnit = $(this).find("#changeUnit").val();
        $(this).find('#valueInSqft').val(area*selectedUnit);

    });
});

$(document).on('change', '#changeUnit', function () {
    $('.areaRow').each(function() {
        var selectedUnit = $(this).find("#changeUnit").val();
        var area = $(this).find(".khetArea").val();
        $(this).find('#valueInSqft').val(area*selectedUnit);
    });
});

// Sell Property -> Add New Property (Row)

function addNewRow(el, id, basra, khata, khet, area)
{
    // console.log(id +', '+ basra +', ' + khata +', ' + khet +', ' + area);
    var markup = $('.importRow').clone();
    $('.importRow').show().html(
        '<div class="col-md-2 mb-3"> <label for="">Khet ID</label> <input type="text" class="formFields" name="khet_id[]" value='+ id +' readonly> </div> <div class="col-md-2 mb-3"> <label for="">Basra no.</label> <input type="text" class="formFields" name="basra_no[]" value='+ basra +' readonly> </div> <div class="col-md-2 mb-3"> <label for="">Khata no.</label> <input type="text" class="formFields" value='+ khata +' readonly> </div> <div class="col-md-2 mb-3"> <label for="">Khet no.</label> <input type="text" class="formFields" name="khet_no[]" value='+ khet +' readonly> </div> <div class="col-md-3 mb-3"> <label for="">Area (Prev. area = '+ area +'sq.ft)</label> <input type="text" class="formFields sold_area" name="sold_area[]"> <input type="text" class="remainingArea" name="rem_area[]" value="" style="display: none;"><input type="text" class="prevArea" name="prev_area[]" value='+ area +' style="display: none;"> </div><div class="col-md-1 mb-3 d-flex align-items-end justify-content-center pb-1"> <button class="btn btn-danger btn-floating shadow-0" onclick="$(this).parent().parent().remove();"><i class="fas fa-times"></i></button> </div>'
    );
    $('.importRow').removeClass('importRow').addClass('importedRow');
    $('.rowManager').append(markup); 
    el.disabled = true; 
    el.innerHTML = 'Added';
}

// Minimize Property Conatiner -> Sell Property
$('.minimizePropContainer').click(function(){
    $('.lstedProperties').slideToggle();
    $(this).children('i').toggleClass('fa-caret-down fa-caret-up');
});

$('.closePropContainer').click(function(){
    $('.listPropertiesContainer').hide();
});

$(document).on("keyup", ".sold_area", function() {
    $prev = $(this).siblings('.prevArea').val();
    $sold = $(this).val();
    $rem = $prev - $sold;
    $(this).siblings('.remainingArea').val($rem);
    var sum = 0;
    $("input[class *= 'sold_area']").each(function(){
        sum += +$(this).val();
    });
    $("#totalArea").val(sum);
});

//Sold Property
function uploadRegBtn(me, id, buyer)
{
    $('#buyer').val(buyer);
    $('#sold_id').val(id);
}

//Add Property
function uploadMyRegBtn(me, id, prop)
{
    $('#property').val(prop);
    $('#prop_id').val(id);
}

//Add 143
function uploadOFT(me, id, khet)
{
    $('#khet').val(khet);
    $('#khet_id').val(id);
}
