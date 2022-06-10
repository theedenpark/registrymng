$('#forPlot').change(function(){
    $val = $(this).val();
    if($val == 1)
    {
        $('#plot').show();
        $('#plot_1').hide();
        $('#plotList').attr('name', 'abc');
        $('#plot_input').attr('name', 'plot_no');
        
        $('#formBody').html('<div class="col-md-6 p-2"> <label for="">Primary Customer</label> <input type="text" name="primary_customer" class="form-control" required> </div> <div class="col-md-6 p-2"> <label for="">Secondary Customer</label> <input type="text" name="secondary_customer" class="form-control" required> </div> <div class="col-md-6 p-2"> <label for="">Email</label> <input type="email" name="email" class="form-control" required> </div> <div class="col-md-6 p-2"> <label for="">Mobile No.</label> <input type="tel" name="mobile" class="form-control" required> </div> <div class="col-md-12 p-2"> <label for="">Address</label> <textarea name="address" class="form-control" required></textarea> </div>');
    }
    else if($val == 2)
    {
        $('#plot_1').show();
        $('#plot').hide();
        $('#plotList').attr('name', 'plot_no');
        $('#plot_input').attr('name', 'abc');
    }
});

$('#phaseSelect').change(function(){
    $recT = $('#forPlot').val();
    $phase = $(this).val();
    $('#plotList').html('<option>Please wait...</option>');

    if($recT == 2)
    {
        $.ajax({
            type: "GET",
            url: '/receipt/plots',
            data: {phase: $phase},
            success: function(response){
                if(response != false)
                {
                    $('#plotList').html(response);
                }
                else
                {
                    $('#plotList').html(response);
                }
            }
       });
    }
});

$('#plot_input').keyup(function(){
    $plot = $(this).val();
    $('#result').html('Checking Availability...')
    $phase = $('#phaseSelect').val();
    $.ajax({
        type: "GET",
        url: '/receipt/checkPlotAvailability',
        data: {
            plot: $plot,
            phase: $phase,
        },
        success: function(response){
            if(response != false)
            {
                $('#result').html('<span class="text-danger" style="font-size: 11px;" id="plotResponseRed"><i class="fa-solid fa-circle-exclamation"></i> Oops! Not Available</span>');
            }
            else
            {
                $('#result').html('<span class="text-success" style="font-size: 11px;" id="plotResponseGreen"><i class="fa-solid fa-check"></i> Hooray!, Its Available</span>');
            }
        }
    });
});

$('#plotList').change(function(){
    $plot = $(this).val();
    $phase = $('#phaseSelect').val();
    $.ajax({
        type: "GET",
        url: '/receipt/checkPlotUser',
        data: {
            plot: $plot,
            phase: $phase,
        },
        success: function(response){
            if(response != false)
            {
                $('#formBody').html(response);
            }
        }
    });
});