// 
$("#newBillForm").submit(function(e) {

    e.preventDefault(); // avoid to execute the actual submit of the form.

    var form = $(this);
    var url = form.attr('actionUrl');

    $('#generateBtn').html('<div class="spinner-border text-light spinner-border-sm" role="status"><span class="visually-hidden"></span></div>&nbsp;Please Wait');

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
                $('#generateBtn').html('Retry');
            }
        }
    });
});

//update
$("#updateReceipt").submit(function(e) {

    e.preventDefault(); // avoid to execute the actual submit of the form.

    var form = $(this);
    var url = form.attr('actionUrl');

    $('#updateBtn').html('<div class="spinner-border text-light spinner-border-sm" role="status"><span class="visually-hidden"></span></div>&nbsp;Updating');

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
                $('#updateBtn').html('Retry');
            }
        }
    });
});