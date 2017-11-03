@extends('layouts.layout')
@section('content')

    <div class="container-fluid breadcum-container-pg">
        <div class="row">
            <div class="col md-12 breadcum-pg">
                <h2>Contact Message Details</h2>
                <h4><strong>Subject:</strong> {{$contact->subject}}</h4>
                <h4><strong>Message:</strong> {{$contact->description}}</h4>
            </div>
        </div>
        @if (session('success'))
            <div class="container alert alert-success" style="background: green;padding: 10px;color: white; font-weight: bold">
                {{ session('success') }}
            </div>
        @endif
    </div>

    <div class="container">
        <br>
        <form method="post" action="{{url('contacts/replay')}}" enctype="multipart/form-data">
            {{csrf_field()}}
            <input type="hidden" value="{{$contact->id}}" name="id">
            <input type="hidden" value="{{$contact->user_id}}" name="user_id">
            <input type="hidden" value="@if($auth->user_type == 2){{$auth->id}}@else{{0}}@endif" name="admin_id">

            <div class="row">
                <div class="col-md-12">
                    <label>Message</label>
                    <textarea name="message" placeholder="Replay Message..." cols="30" rows="5">{{old('message')}}</textarea>
                    <span style="font-size: 9px;{{ $errors->has('message') ? 'color:red' : '' }}">{{ $errors->first('message')}}</span>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <label style="margin-bottom: -9px;">Attachment</label>
                    <span style="font-size: 9px;{{ $errors->has('attach') ? 'color:red' : '' }}">{{ $errors->has('attach') ? $errors->first('attach') : 'Have a attachment?'}}</span>
                    <input type="file" name="attach">
                </div>
            </div>
            <br>
            <div class="pull-left">
                <button type="submit" class="button" style="padding: 4px 10px!important; font-size: 13px!important; margin-top: 3px;">Replay Message</button>
            </div>
        </form>
        <br>
        <br>
        <table class="table table-bordered table-hover">
            <thead class="breadcum-container-pg">
            <tr>
                <th>SL</th>
                <th>Replay Message</th>
                <th>Attachment</th>
                <th>Replay By</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($contact->details as $info)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$info->description}}</td>
                    <td>
                        @if($contact->attach)
                            <a href="{{asset('uploads/attachment/'.$contact->attach)}}" target="_blank">
                                <img width="60px" src="{{asset('uploads/attachment/'.$contact->attach)}}" alt="">
                            </a>
                        @else
                            No attachment
                        @endif
                    </td>
                    <td>@if($info->admin_id !=0){{$info->admin->full_name}} (Admin) @else{{$info->user->full_name}}@endif</td>
                    <td>{{$info->created_at->format('d M Y')}}</td>
                    <td>
                        <a onclick="return checkDelete('delete','Are you sure delete this message?','{{url('contacts/'.$info->id.'/delete')}}')" href="#" class="button" style="background: red;padding: 4px 10px!important; font-size: 13px!important;">Delete</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="13">
                        <h4>No replay message available</h4>
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
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
            width: 30%!important;
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
    </style>

    <script type="text/javascript" src="{{asset('js/sweetalert2.js')}}"></script>
    <script>
        function checkDelete(btn, message, url){
            swal({
                title: message,
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#218838',
                cancelButtonColor: '#c82333',
                confirmButtonText: 'Yes, '+btn+' it!',
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