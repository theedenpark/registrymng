function insert(elem)
{
    $prevHtml = $(elem).html();

    $(elem).html('<div class="spinner-border text-light spinner-border-sm" role="status"><span class="visually-hidden"></span></div>');

    // $(elem).prop('disabled', true);

    $form =  $(elem).closest('form');
    $url = $(elem).closest('form').attr('actionUrl');

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'POST',
        url: $url,
        data: $form.serialize(),
        // contentType: "multipart/form-data",
        // processData: false,
        // contentType: false,
        success: function (res){
            if(res == true)
                {
                    $(elem).html($prevHtml);
                    $(elem).prop('disabled', false);
                    $form.trigger("reset");
                    setTimeout(() => {
                        listProps()
                    }, 2000);
                }
                else
                {
                    $(elem).prop('disabled', false);
                    $(elem).html('Retry');
                }
        }
    });
}


// Login
$("#loginForm").submit(function(e) {

    e.preventDefault(); // avoid to execute the actual submit of the form.

    var form = $(this);
    var url = form.attr('actionUrl');

    $('#loginBtn').html('<div class="spinner-border text-light spinner-border-sm" role="status"><span class="visually-hidden"></span></div>&nbsp;Validating');

    $.ajax({
        type: "POST",
        url: url,
        data: form.serialize(), // serializes the form's elements.
        success: function(data)
        {
            if(data == true)
            {
                $('.success').fadeIn();
                window.location.reload();
            }
            else
            {
                $('.failed').fadeIn();
                $('#loginBtn').html('Retry');
            }
        }
    });
});

// Add new Property Type
$("#propertyTypeForm").submit(function(e) {

    e.preventDefault(); // avoid to execute the actual submit of the form.

    var form = $(this);
    var url = form.attr('actionUrl');

    $('#addBtn').html('<div class="spinner-border text-light spinner-border-sm" role="status"><span class="visually-hidden"></span></div>&nbsp;Please Wait');

    $.ajax({
        type: "POST",
        url: url,
        data: form.serialize(), // serializes the form's elements.
        success: function(data)
        {
            if(data == true)
            {
                $('.proptypeAdded').fadeIn();
                window.location.reload();
            }
            else
            {
                $('.proptypeDenied').fadeIn();
                $('#addBtn').html('Retry');
            }
        }
    });
});

// Add new bank user
$("#newBankUserForm").submit(function(e) {

    e.preventDefault(); // avoid to execute the actual submit of the form.

    var form = $(this);
    var url = form.attr('actionUrl');

    $('#addBtn').html('<div class="spinner-border text-light spinner-border-sm" role="status"><span class="visually-hidden"></span></div>&nbsp;Please Wait');

    $.ajax({
        type: "POST",
        url: url,
        data: form.serialize(), // serializes the form's elements.
        success: function(data)
        {
            if(data == true)
            {
                $('.bankUserAdded').fadeIn();
                window.location.reload();
            }
            else
            {
                $('.bankUserDenied').fadeIn();
                $('#addBtn').html('Retry');
            }
        }
    });
});

// Add new unit
$("#newUnitForm").submit(function(e) {

    e.preventDefault(); // avoid to execute the actual submit of the form.

    var form = $(this);
    var url = form.attr('actionUrl');

    $('#addBtn').html('<div class="spinner-border text-light spinner-border-sm" role="status"><span class="visually-hidden"></span></div>&nbsp;Please Wait');

    $.ajax({
        type: "POST",
        url: url,
        data: form.serialize(), // serializes the form's elements.
        success: function(data)
        {
            if(data == true)
            {
                $('.unitAdded').fadeIn();
                window.location.reload();
            }
            else
            {
                $('.unitDenied').fadeIn();
                $('#addBtn').html('Retry');
            }
        }
    });
});

// Add new User
$("#newUserForm").submit(function(e) {

    e.preventDefault(); // avoid to execute the actual submit of the form.

    var form = $(this);
    var url = form.attr('actionUrl');

    $('#addBtn').html('<div class="spinner-border text-light spinner-border-sm" role="status"><span class="visually-hidden"></span></div>&nbsp;Please Wait');

    $.ajax({
        type: "POST",
        url: url,
        data: form.serialize(), // serializes the form's elements.
        success: function(data)
        {
            if(data == true)
            {
                $('.userAdded').fadeIn();
                window.location.reload();
            }
            else
            {
                $('.userDenied').fadeIn();
                $('#addBtn').html('Retry');
            }
        }
    });
});

// Add new Revenue Village
$("#newRevenueVillageForm").submit(function(e) {

    e.preventDefault(); // avoid to execute the actual submit of the form.

    var form = $(this);
    var url = form.attr('actionUrl');

    $('#addBtn').html('<div class="spinner-border text-light spinner-border-sm" role="status"><span class="visually-hidden"></span></div>&nbsp;Please Wait');

    $.ajax({
        type: "POST",
        url: url,
        data: form.serialize(), // serializes the form's elements.
        success: function(data)
        {
            if(data == true)
            {
                $('.villageAdded').fadeIn();
                window.location.reload();
            }
            else
            {
                $('.villageDenied').fadeIn();
                $('#addBtn').html('Retry');
            }
        }
    });
});


$("#themeChange").submit(function(e) {

    e.preventDefault(); // avoid to execute the actual submit of the form.

    var form = $(this);
    var url = form.attr('actionUrl');

    $.ajax({
        type: "POST",
        url: url,
        data: form.serialize(), // serializes the form's elements.
        success: function(data)
        {
            $('.alertReload').fadeIn();
        }
    });
});

// Send Mail to draftmen
$("#sendMailToDraftment").submit(function(e) {

    e.preventDefault(); // avoid to execute the actual submit of the form.

    var form = $(this);
    var url = form.attr('actionUrl');

    $('#addBtn').html('<div class="spinner-border text-light spinner-border-sm" role="status"><span class="visually-hidden"></span></div>&nbsp;Sending');

    $.ajax({
        type: "POST",
        url: url,
        data: form.serialize(), // serializes the form's elements.
        success: function(data)
        {
            if(data != false)
            {
                $('#sendMailToDraftment').slideUp();
                $('.message').show();
                $('.message').html('Mail Sent Successfully!');
                $('#addBtn').html('<i class="fas fa-paper-plane"></i>&nbsp; Send');
                $('.minimize').hide();
            }
            else
            {
                alert('failed');
                $('#addBtn').html('<i class="fas fa-paper-plane"></i>&nbsp; Try Again');
            }
        }
    });
});
