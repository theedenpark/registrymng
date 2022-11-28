<table class="table table-responsive table-hover table-sm" style="font-size: 11px;" id="myDataTable">
    <thead>
        <tr>
            <th>Village</th>
            <th>Reg/Jild/Page</th>
            <th>Property_name</th>
            <th>Property_ac</th>
            <th>Seller</th>
            <th>Date_of_Reg</th>
            <th class="text-center">Registry</th>
            <th class="text-center">View</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($allProperties as $prop)
        <tr>
            <td>{{$prop->p_village}}</td>
            <td>{{$prop->reg_no}}/{{$prop->jild_no}}/{{$prop->page_no}}</td>
            <td>{{$prop->prop_name}}</td>
            <td>
                <select name="" id="" class="form-control form-control-sm px-1 py-0" style="width: fit-content;" onchange="changeIndividual(this, `{{$prop->prop_id}}`)">
                    <option value="{{$prop->user_id}}" selected>{{$prop->username}}</option>
                    @php
                        $prop_acc = DB::table('individual_management')
                                    ->where('user_type', 1)
                                    ->get();
                    @endphp
                    @foreach ($prop_acc as $account)
                    <option value="{{$account->user_id}}">{{$account->username}}</option>
                    @endforeach
                </select>
                <span id="result" class="bg-none" style="font-size: 11px;"></span>
            </td>

            <td>
                @php
                    $seller = explode(', ', $prop->seller_id);
                @endphp
                @foreach ($seller as $value)
                    @php
                        $data = DB::table('individual_management')
                                ->select('username', 'user_id')
                                ->where('user_id', $value)
                                ->first();
                    @endphp
                    {{$data->username}},&nbsp;
                @endforeach
            </td>

            <td>{{date('d-m-Y', strtotime($prop->date_of_reg))}}</td>
            <td class="text-center">
                @if($prop->reg_file == 0)
                    <button class="btn btn-light btn-floating shadow-0 btn-sm" data-mdb-toggle="modal"
                        data-mdb-target="#exampleModal"
                        onclick="uploadMyRegBtn(this, `{{$prop->prop_id}}`, `{{$prop->prop_name}}`)">
                        <i class="fa-solid fa-arrow-up-from-bracket text-danger"></i>
                    </button>
                @else
                    <span class="badge bg-success" style="font-weight: 400 !important;">Available</span>
                @endif
            </td>
            <td class="text-center">
                <button class="btn btn-light btn-floating shadow-0 p-0 btn-sm" onclick="viewPropDetails(`{{$prop->prop_id}}`)">
                    <i class="fas fa-eye p-0" style="font-size: 13px;"></i>
                </button>
            </td>
        </tr>
        @endforeach
    </tbody>
</tbody>

<script>
    // Data Tables 
$(function(){
    $("#myDataTable").dataTable({
        "aaSorting": []
    });
});

function changeIndividual(elem, prop_id)
{
    $(elem).parent().children('span').html('<span class="spinner-border text-danger spinner-border-sm" role="status"></span>');
    $prop_acc = $(elem).val();
    $.ajax({
        type: 'GET',
        url: '/changeIndividual',
        data: {
            'prop_acc' : $prop_acc,
            'prop_id' : prop_id,
        },
        success: function(res)
        {
            if(res == true)
            {
                $(elem).parent().children('span').html('<span class="text-success">Changed</span>');
            }
            else
            {
                $(elem).parent().children('span').html('<span class="text-danger">Failed</span>');
            }
        }
    });
}


</script>

</table>