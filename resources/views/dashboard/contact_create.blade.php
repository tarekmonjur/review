@extends('layouts.layout')
@section('content')

    <div class="container-fluid breadcum-container-pg">
        <div class="row">
            <div class="col md-12 breadcum-pg">
                <h2>Send Message</h2>
                Home <i aria-hidden="true" class="fa fa-chevron-right"></i> Send Contact Message
            </div>
        </div>
        @if (session('error'))
            <div class="container alert alert-success" style="background: red;padding: 10px;color: white; font-weight: bold">
                {{ session('error') }}
            </div>
        @endif
    </div>

    <div class="container">
        <form method="post" action="{{url('/contacts')}}">
            {{csrf_field()}}
            <input type="hidden" name="admin_id" value="{{$admin_id}}">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="registration-page margin-top-35">
                        @if(isset($users))
                        <div class="row">
                            <div class="col-md-6">
                                <label style="margin-bottom: -9px;">User</label>
                                <span style="font-size: 9px;{{ $errors->has('user_id') ? 'color:red' : '' }}">{{$errors->has('user_id')?$errors->first('user_id'):'where you send message?'}}</span>
                                <select class="vendor" name="user_id">
                                    <option value="">---Select User---</option>
                                    @foreach($users as $user)
                                    <option @if(old('user_id') == $user->id) selected @endif value="{{$user->id}}">{{$user->full_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @elseif(isset($user_id))
                            <input type="hidden" name="user_id" value="{{$user_id}}">
                        @endif
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <label style="margin-bottom: -9px;">Message Subject</label>
                                <span style="font-size: 9px;{{ $errors->has('subject') ? 'color:red' : '' }}">{{ $errors->has('subject') ? $errors->first('subject') : 'subject is required'}}</span>
                                <input placeholder="message subject..." type="text" name="subject" value="{{old('message')}}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <label style="margin-bottom: -9px;">Message</label>
                                <span style="font-size: 9px;{{ $errors->has('message') ? 'color:red' : '' }}">{{ $errors->has('message') ? $errors->first('message') : 'message is required'}}</span>
                                <textarea name="message" placeholder="Message..." cols="30" rows="10">{{old('message')}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>

            <div class="row margin-bottom-20">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <input class="button border margin-top-5 login-padding" name="send_message" type="submit" value="Send Message">
                </div>
                <div class="col-md-2"></div>
            </div>
        </form>
        <!--end of form -->
    </div>


@endsection