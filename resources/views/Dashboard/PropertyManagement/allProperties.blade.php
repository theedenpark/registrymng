<table class="table table-responsive table-hover table-sm table-bordered" style="font-size: 11px;" id="myDataTable">
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
            <td>{{$prop->prop_acc}}</td>
            <td>{{$prop->seller_id}}</td>
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

</table>