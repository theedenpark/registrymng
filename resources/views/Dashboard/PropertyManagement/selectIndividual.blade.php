<option value="" disabled selected>Select Individual</option>
@foreach ($data as $user)
    <option value="{{$user->user_id}}">{{$user->username}}</option>
@endforeach