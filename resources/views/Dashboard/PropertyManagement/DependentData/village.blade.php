<option value="">Select Village</option>
@foreach($villages as $village)
    <option value="{{$village->village}}">{{$village->village}}</option>
@endforeach