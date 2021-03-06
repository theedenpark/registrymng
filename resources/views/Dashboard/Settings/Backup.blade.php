@extends('Dashboard.dashboard')

@section('dashboardContent')
<div class="container col-md-12">
    <div class="card p-4">
        <h4>Create Backup</h4>
        <p style="font-size: 12px; color: gray;">
            Backups automatically create & downloads the copy of all your registry. You can easily create a backup of
            all your registries by clicking on the below button.
        </p>
        <div class="d-flex justify-content-end">
            <button class="btn btn-primary shadow-5 text-capitalize" id="createBackupBtn">
                <i class="fas fa-database"></i>&nbsp; Create Backup
            </button>
        </div>
    </div>

    <div class="card my-4 p-4" style="overflow-x: auto !important;">
        <h4 class="pb-2">Previous Backups</h4>
        <div style="max-height: 300px; height: fit-content; overflow-y: auto;">
            <table class="table" style="font-size: 12px;">
                @foreach($data as $value)
                <tr style="color: rgba(0,0,0,0.5);">
                    <td width="10px">
                        <i class="fas fa-history"></i>
                    </td>
                    <td class=" px-0"> {{$value->backup_type}} Registry Backup Generated By {{$value->user_id}}. </td>
                    <td class="text-end" style="color: rgba(0,0,0,0.65); font-size: 11px;">
                        <i class="fas fa-calendar-alt" style="padding-right: 1px;"></i>
                        {{date('d-m-Y', strtotime($value->generated_on))}} <i class="far fa-clock"></i>
                        <font style="font-size: 10px;">{{date('h:i a', strtotime($value->generated_on))}}</font>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>

<div class="backupOptCont shadow-2" style="display: none;">
    <div class="optContainer container col-md-5 p-4">
        <h1>Tell Us! What do you want to<br>Back Up?</h1>
        <!-- Purchased  -->
        <form action="/pBackup" method="post" id="newBackup" class="mt-4">
            @csrf
            <input type="text" value="Purchased" name="backup_type" style="display: none;">
            <input type="text" value="User" name="user" style="display: none;">
            <button class="backUpBtn text-start px-3" id="addBtn">
                <i class="fas fa-database"></i>&nbsp; Purchased Registries
            </button>
        </form>

        <!-- Sold  -->
        <form action="/sBackup" method="post" id="newBackup" class="mt-3">
            @csrf
            <input type="text" value="Sold" name="backup_type" style="display: none;">
            <input type="text" value="User" name="user" style="display: none;">
            <button class="backUpBtn text-start px-3" id="addBtn">
                <i class="fas fa-database"></i>&nbsp; Sold Registries
            </button>
        </form>

        <button class="closeUpBtn mt-3 text-start px-3" id="addBtn">
                <i class="fas fa-times"></i>&nbsp; No, I don't want.
        </button>
    </div>
</div>
@endsection
