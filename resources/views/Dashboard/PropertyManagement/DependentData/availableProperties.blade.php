<div class="d-flex justify-content-end my-2 px-2">
    <div class="text-end col-md-2">
        <input type="search" class="formFields py-2" placeholder="Search" style="font-size: 11px;">
    </div>
</div>
<table class="table table-responsive table-sm" style="font-size: 12px;" id="myDataTable">
    <thead>
        <tr class="bg-light">
            <th>Khet ID</th>
            <th>Basra No</th>
            <th>Khata No</th>
            <th>Khet No</th>
            <th>Khet Area (In sq.ft.)</th>
            <th>Property Name</th>
            <th>Purchase At</th>
            <th class="text-center">Select</th>
        </tr>
    </thead>
    <tbody id="myTable">
        @foreach($allProps as $prop)
        <tr>
            <td>
                {{$prop->khet_id}}
            </td>
            <td>
                {{$prop->basra_no}}
            </td>
            <td>
                {{$prop->khata_no}}
            </td>
            <td>
                {{$prop->khet_no}}
            </td>
            <td>
                {{$prop->khet_area}}
            </td>
            <td>
                {{$prop->prop_name}}
            </td>
            <td>
                ₹{{$prop->reg_value}}
            </td>
            <td class="text-center">
                <button class="btn btn-sm btn-info text-capitalize shadow-0" onclick="addNewRow(this, `{{$prop->khet_id}}`, `{{$prop->basra_no}}`, `{{$prop->khata_no}}`, `{{$prop->khet_no}}`, `{{$prop->khet_area}}`)">
                    <i class="fas fa-plus"></i> Add
                </button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
