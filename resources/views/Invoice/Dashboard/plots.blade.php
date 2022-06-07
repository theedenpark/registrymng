<option selected disabled>Select Plot</option>
@foreach($plots as $plot)
    <option value="{{$plot->plot_no}}">{{$plot->plot_no}}</option>
@endforeach