$('.districtChange').change(function(){
    $dist = $(this).val();
    $.ajax({
        type: "GET",
        url: '../getTehsil',
        data: {dist: $dist},
        success: function(response){
            if(response != false)
            {
                $('#myTehsil').html(response);
            }
            else
            {
                $('#myTehsil').html('<option>No Tehsil Added</option>');
            }
        }
   });
}); 

$('.tehsilChange').change(function(){
    $tehsil = $(this).val();
    $.ajax({
        type: "GET",
        url: '../getVillage',
        data: {tehsil: $tehsil},
        success: function(response){
            if(response != false)
            {
                $('#myVillage').html(response);
            }
            else
            {
                $('#myVillage').html('<option>No Village Available</option>');
            }
        }
   });
}); 

$('.villageChange').change(function(){
    $('.listbtn').show();
}); 

$('.listbtn').click(function(){
    $('.listPropertiesContainer').show();
    $village = $('#myVillage').val();
    $tehsil = $('#myTehsil').val();
    $district = $('#myDistrict').val();
    $.ajax({
        type: "GET",
        url: '../getPropeties',
        data: {tehsil: $tehsil, village: $village, district: $district},
        success: function(response){
            if(response != false)
            {
                $('.lstedProperties').html(response);
            }
            else
            {
                $('.lstedProperties').html('<option>No Village Available</option>');
            }
        }
   });
}); 