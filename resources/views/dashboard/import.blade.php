@extends('layouts.layout')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form method="post" action="{{url('import')}}" enctype="multipart/form-data">
                {{csrf_field()}}
                <label for="import">Import Vendor Data</label>
                <input type="file" id="import" name="db" class="form-control">
                <input type="submit" value="Import" name="import" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>

@endsection