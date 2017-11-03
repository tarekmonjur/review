@extends('layouts.layout')
@section('content')

    <div class="container-fluid breadcum-container-pg">
        <div class="row">
            <div class="col md-12 breadcum-pg">
                <h2>Contact Messages</h2>
                Home <i aria-hidden="true" class="fa fa-chevron-right"></i> Manage Contact Messages
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
        <div class="pull-right">
            <a href="{{url('contacts/create')}}" class="button" style="padding: 4px 10px!important; font-size: 13px!important;">Send Message</a>
        </div>
        <table class="table table-bordered table-hover">
            <thead class="breadcum-container-pg">
            <tr>
                <th>SL</th>
                @if($auth->user_type == 1)
                <th>User Name</th>
                @endif
                <th>Status</th>
                <th>Subject</th>
                <th>Message</th>
                <th>Attachment</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($contacts as $contact)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    @if($auth->user_type == 1)
                    <td>{{$contact->user->full_name}}</td>
                    @endif
                    <td>
                        @if($contact->details->count() > 0)
                            <label class="label label-warning">Running</label>
                        @else
                            <label class="label label-primary">No replay</label>
                        @endif
                    </td>
                    <td><a href="{{url('contacts/'.$contact->id)}}">{{$contact->subject}}</a></td>
                    <td>
                        @if($contact->details->count() > 0)
                            <a href="{{url('contacts/'.$contact->id)}}">{{$contact->latest->description}}</a>
                        @else
                            <a href="{{url('contacts/'.$contact->id)}}">{{$contact->description}}</a>
                        @endif
                    </td>
                    <td>
                        @if($contact->attach)
                            <a href="{{asset('uploads/attachment/'.$contact->attach)}}" target="_blank">
                                <img width="60px" src="{{asset('uploads/attachment/'.$contact->attach)}}" alt="">
                            </a>
                            @else
                            No attachment
                        @endif
                    </td>
                    <td>{{$contact->created_at->format('d M Y')}}</td>
                    <td>
                        {{--<a href="{{url('contacts/'.$contact->id.'/edit')}}" class="button" style="padding: 4px 10px!important; font-size: 13px!important;">Edit</a>--}}
                        <a onclick="return checkDelete('delete','Are you sure delete this message?','{{url('contacts/'.$contact->id.'/delete')}}')" href="#" class="button" style="background: red;padding: 4px 10px!important; font-size: 13px!important;">Delete</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="13">
                        <h4>No message available</h4>
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
        {{ $contacts->links('vendor.pagination.default') }}
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
        .label-primary {
            background-color: #0e91ff;
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