@extends('layouts.layout')
@section('content')

    <div class="container-fluid breadcum-container-pg">
        <div class="row">
            <div class="col md-12 breadcum-pg">
                <h2>Users</h2>
                Home <i aria-hidden="true" class="fa fa-chevron-right"></i> Manage Users
            </div>
        </div>
    </div><!--End of breadcrum=-->

    <!---review page-->
    <div class="container-fluid">
        <br>
        @if (session('success'))
            <div class="container alert alert-success" style="background: green;padding: 10px;color: white; font-weight: bold">
                {{ session('success') }}
            </div>
        @endif
        <br>
        <table class="table table-bordered table-hover">
            <thead class="breadcum-container-pg">
            <tr>
                <th>SL</th>
                <th>User Name</th>
                <th>User Type</th>
                <th>Email Address</th>
                <th>Mobile No</th>
                <th>Verify Email</th>
                <th>Company Name</th>
                <th>Gender</th>
                <th>About</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($users as $user)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$user->full_name}}</td>
                    <td>@if($user->user_type == 1) User @elseif($user->user_type ==2) Admin @endif</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->mobile_no}}</td>
                    <td>@if($user->email_verify == 1) Verified @elseif($user->email_verify == 0) Unverified @endif</td>
                    <td>{{$user->company_name}}</td>
                    <td>{{$user->gender}}</td>
                    <td>{{$user->about or 'No About..'}}</td>
                    <td>{{$user->created_at->format('d M Y')}}</td>
                    <td>
                        <a href="{{url('users/edit/'.$user->id)}}" class="button" style="padding: 4px 10px!important; font-size: 13px!important;">Edit</a>
                        <a onclick="return checkDelete('Are you sure delete this user?','{{url('users/delete/'.$user->id)}}')" href="#" class="button" style="background: red;padding: 4px 10px!important; font-size: 13px!important;">Delete</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="13">
                        <h4>No review available</h4>
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
        {{ $users->links('vendor.pagination.default') }}
    </div>
@endsection

@section('script')
    <link type="text/css" rel="stylesheet" href="{{asset('css/sweetalert2.css')}}">
    <style>
        .swal2-buttonswrapper .btn{
            font-size: 12px!important;
            padding: 7px 14px 8px 14px!important;
            border-radius: 2px!important;
            font-weight: bold!important;
            display: inline-block!important;
            margin-bottom: 0!important;
            text-align: center!important;
            vertical-align: middle!important;
            cursor: pointer!important;
            background-image: none!important;
            border: 1px solid transparent!important;
            width: 25%!important;
            color: white!important;
        }
        .swal2-buttonswrapper .btn-success{
            background-color: #239169!important;
            border-color: #239169!important;
        }
        .swal2-buttonswrapper .btn-success:hover{
            background-color: #289C72!important;
            border-color: #289C72!important;
        }
        .swal2-buttonswrapper .btn-danger{
            background-color: #D36A5F!important;
            border-color: #D36A5F!important;
        }
        .swal2-buttonswrapper .btn-danger:hover{
            background-color: #DD7469!important;
            border-color: #DD7469!important;
        }

        .label {
            display: inline;
            padding: .2em .6em .3em;
            font-size: 75%;
            font-weight: 700;
            line-height: 1;
            color: #fff;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: .25em;
        }
        .label-warning {
            background-color: #f0ad4e;
        }
        .label-success {
            background-color: #5cb85c;
        }
        .label-danger {
            background-color: #d9534f;
        }
    </style>
    <script type="text/javascript" src="{{asset('js/sweetalert2.js')}}"></script>
    <script>
        function checkDelete(message, url){
            swal({
                title: message,
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#218838',
                cancelButtonColor: '#c82333',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false
            }).then(function () {
                console.log(url);
                window.location.href=url;
                // swal(
                //   'Deleted!',
                //   'Your file has been deleted.',
                //   'success'
                // )
            }, function (dismiss) {
                // dismiss can be 'cancel', 'overlay',
                // 'close', and 'timer'
                if (dismiss === 'cancel') {
                    swal(
                        'Cancelled',
                        'your stuff is safe.',
                        'error'
                    )
                }
            })
        }
    </script>
@endsection

