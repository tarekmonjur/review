@extends('layouts.layout')
@section('content')

    <div class="container-fluid breadcum-container-pg">
        <div class="row">
            <div class="col md-12 breadcum-pg" style="margin: 100px 0px 100px 0px">
                <h2>Attivazione dell'account Opinionsoftware!</h2>
                @if (session('success')) {!!  session('success') !!} @endif
            </div>
        </div>
    </div><!--End of breadcrum=-->
@endsection
