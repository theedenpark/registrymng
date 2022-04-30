@extends('Dashboard.dashboard')

@section('dashboardContent')
<div class="container col-md-10">
    <div class="card p-4" style="overflow-x: auto !important;">
        <h4 class="pb-3"><i class="fas fa-list"></i> &nbsp;Activity Logs</h4>
        <table class="table table-sm table-hover my-3" id="myDataTable">
            <thead>
                <tr>
                    <th>S.no.</th>
                    <th>User</th>
                    <th>Activity</th>
                    <th>Generated At</th>
                </tr>
            </thead>
            <tbody style="font-size: 12px !important; color: gray;">
                @foreach($logs as $log)
                <tr>
                    <td>{{$log->sn}}</td>
                    <td>{{$log->user_id}}</td>
                    <td>
                        @if($log->activity_type == 1)
                            <font class="text-success">Logged In</font>
                            @elseif($log->activity_type == 2)
                            <font class="text-danger">Logged Out</font>
                        @endif
                    </td>
                    <td>{{date('d-m-Y', strtotime($log->generated_at))}} at {{date('h:i a', strtotime($log->generated_at))}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection