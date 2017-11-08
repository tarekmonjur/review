@extends('layouts.layout')

@section('style')
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
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
    </style>
@endsection

@section('content')

    <div class="container-fluid breadcum-container-pg">
        <div class="row">
            <div class="col md-12 breadcum-pg">
                <h2>Reviews</h2>
                Home <i aria-hidden="true" class="fa fa-chevron-right"></i> Manage Reviews
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

        @if (session('error'))
            <div class="container alert alert-danger" style="background: green;padding: 10px;color: white; font-weight: bold">
                {{ session('error') }}
            </div>
        @endif
        <br>
        <table class="table table-bordered table-hover" id="example">
            <thead class="breadcum-container-pg">
                <tr>
                    <th>SL</th>
                    @if($auth->user_type == 2)
                    <th>User Name</th>
                    @endif
                    <th>Software</th>
                    <th>Vendor</th>
                    <th>Score</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Easy Use</th>
                    <th>Implementation</th>
                    <th>Technical</th>
                    <th>Update</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @forelse ($reviews as $review)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    @if($auth->user_type == 2)
                    <td>{{$review->user->full_name}}</td>
                    @endif
                    <td>{{$review->software->software_name}}</td>
                    <td>{{$review->vendor->name}}</td>
                    <td>{{$review->software_score}} / 5</td>
                    <td>{{$review->title}}</td>
                    <td>{{$review->description or 'No Description..'}}</td>
                    <td>{{$review->easy_use_score}} / 5</td>
                    <td>{{$review->implementation_score}} / 5</td>
                    <td>{{$review->technical_score}} / 5</td>
                    <td>{{$review->update_score}} / 5</td>
                    <td>
                        @if($review->status == 0)
                            <label class="label label-warning">Pending</label>
                        @elseif($review->status == 1)
                            <label class="label label-success">Approved</label>
                        @elseif($review->status == 2)
                            <label class="label label-danger">Reject</label>
                        @endif
                    </td>
                    <td>{{$review->created_at->format('d M Y')}}</td>
                    <td>
                        <a href="{{url('reviews/edit/'.$review->id)}}" class="button" style="padding: 4px 10px!important; font-size: 13px!important;">Edit</a>
                        <a onclick="return checkDelete('delete','Are you sure delete this review?','{{url('reviews/delete/'.$review->id)}}')" href="#" class="button" style="background: red;padding: 4px 10px!important; font-size: 13px!important;">Delete</a>
                        @if($auth->user_type == 2)
                            @if($review->status == 0)
                                <a onclick="return checkDelete('approved','Are you sure approved this review?','{{url('reviews/status/'.$review->id.'/1')}}')" href="#" class="label label-success">Approved</a>
                                <a onclick="return checkDelete('reject','Are you sure reject review?','{{url('reviews/status/'.$review->id.'/2')}}')" href="#" class="label label-danger">Reject</a>
                            @elseif($review->status == 1)
                                <a onclick="return checkDelete('pending','Are you sure pending this review?','{{url('reviews/status/'.$review->id.'/0')}}')" href="#" class="label label-warning">Pending</a>
                                <a onclick="return checkDelete('reject','Are you sure reject this review?','{{url('reviews/status/'.$review->id.'/2')}}')" href="#" class="label label-danger">Reject</a>
                            @elseif($review->status == 2)
                                <a onclick="return checkDelete('pending','Are you sure pending this review?','{{url('reviews/status/'.$review->id.'/0')}}')" href="#" class="label label-warning">Pending</a>
                                <a onclick="return checkDelete('approved','Are you sure reject this review?','{{url('reviews/status/'.$review->id.'/1')}}')" href="#" class="label label-success">Approved</a>
                            @endif
                        @endif
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
        {{ $reviews->links('vendor.pagination.default') }}
    </div>
@endsection

@section('script')
    <script type="text/javascript" src="{{asset('js/sweetalert2.js')}}"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
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

        $(document).ready(function() {
            $('#example').DataTable( {
                "order": [[ 2, "asc" ]],
                "dom": '<"top"><"bottom"><"clear">'
            } );
        } );
    </script>
@endsection

