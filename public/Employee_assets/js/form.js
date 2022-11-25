$("#addGroupForm").submit(function(e) {

    e.preventDefault();

    var form = $(this);
    var url = form.attr('actionUrl');

    $('#submitBtn').html('<div class="spinner-border text-light spinner-border-sm" role="status"><span class="visually-hidden"></span></div>&nbsp;Please Wait');

    $.ajax({
        type: "POST",
        url: url,
        data: form.serialize(),
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
                $('#submitBtn').html('Retry');
            }
        }
    });
});

$("#addEmployeeForm").submit(function(e) {

    e.preventDefault();

    var form = $(this);
    var url = form.attr('actionUrl');

    $('#submitBtn').html('<div class="spinner-border text-light spinner-border-sm" role="status"><span class="visually-hidden"></span></div>&nbsp;Please Wait');

    $.ajax({
        type: "POST",
        url: url,
        data: form.serialize(),
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
                $('#submitBtn').html('Retry');
            }
        }
    });
});