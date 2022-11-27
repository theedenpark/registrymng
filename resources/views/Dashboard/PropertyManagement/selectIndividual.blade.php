<option value="" disabled selected>Select Individual</option>
@foreach ($data as $user)
    <option value="{{$user->username}}">{{$user->username}}</option>
@endforeach