@extends('layouts.layout')
@section('style')
    <style>
        .checkbox-hide-show{
            width: 15px;
            height: 15px;
            margin-left: 10px;
        }
    </style>
@endsection
@section('content')

    <div class="container-fluid breadcum-container-pg">
        <div class="row">
            <div class="col md-12 breadcum-pg">
                <h2>Profile</h2>
                Home <i aria-hidden="true" class="fa fa-chevron-right"></i> My Profile
            </div>
        </div>

        @if (session('success'))
            <br>
            <div class="container alert alert-success" style="background: green;padding: 10px;color: white; font-weight: bold">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <br>
            <div class="container alert alert-danger" style="background: red;padding: 10px;color: white; font-weight: bold">
                {{ session('error') }}
            </div>
        @endif

    </div>

    <div class="container" id="signup">
        <form method="post" action="{{url('/users/profile')}}" enctype="multipart/form-data">
            <input type="hidden" name="id" value="{{$user->id}}">
            {{csrf_field()}}

            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <br>
                    <h5>Seleziona la casella di controllo se non ti piace la condivisione pubblica</h5>
                    <div class="registration-page margin-top-35">
                        <div class="row">
                            <div class="col-md-6">
                                <label style="margin-bottom: -9px;">Il tuo nome</label>
                                <span style="font-size: 9px;{{ $errors->has('first_name') ? 'color:red' : '' }}">Inserisci il tuo nome</span>
                                <span><input type="checkbox" class="checkbox-hide-show" name="first_name_privacy" value="1" @if(isset($user->setting) && $user->setting->first_name == 1) checked @endif></span>
                                <input placeholder="Tom" type="text" name="first_name" value="{{(old('first_name'))?:$user->first_name}}">
                            </div>
                            <div class="col-md-6">
                                <label style="margin-bottom: -9px;">Il tuo cognome</label>
                                <span style="font-size: 9px;{{ $errors->has('last_name') ? 'color:red' : '' }}">Inserisci il tuo nome completo </span>
                                <span><input type="checkbox" class="checkbox-hide-show" name="last_name_privacy" value="1" @if(isset($user->setting) && $user->setting->last_name == 1) checked @endif></span>
                                <input placeholder="Perrin" type="text" name="last_name" value="{{(old('last_name'))?:$user->last_name}}">
                            </div>
                        </div>

                        <!--Email-->
                        <div class="row">
                            <div class="col-md-6">
                                <label style="margin-bottom: -9px;">Email</label>
                                <span style="font-size: 9px;{{ $errors->has('email') ? 'color:red' : '' }}"> Se inserisci un'email privata devi inserire il telefono aziendale</span>
                                <span><input type="checkbox" class="checkbox-hide-show" name="email_privacy" value="1" @if(isset($user->setting) && $user->setting->email == 1) checked @endif></span>
                                <input placeholder="tom@example.com" type="email" name="email" value="{{(old('email'))?:$user->email}}">
                            </div>
                            <div class="col-md-6">
                                <label style="margin-bottom: -9px;">Contatto telefonico azienda</label>
                                <span style="font-size: 9px;{{ $errors->has('mobile_no') ? 'color:red' : '' }}">Telefono aziendale</span>
                                <span><input type="checkbox" class="checkbox-hide-show" name="mobile_no_privacy" value="1" @if(isset($user->setting) && $user->setting->mobile_no == 1) checked @endif></span>
                                <input placeholder="(123) 123-456" type="text" name="mobile_no" value="{{(old('mobile_no'))?:$user->mobile_no}}">
                            </div>
                        </div>

                        <!--Password-->
                        <div class="row">
                            <div class="col-md-6">
                                <label style="margin-bottom: -9px;">Password</label>
                                <span style="font-size: 9px;{{ $errors->has('password') ? 'color:red' : '' }}"> Inserisci la tua password</span>
                                <input placeholder="Inserisci Password" type="password" name="password" value="{{old('password')}}">
                            </div>
                            <div class="col-md-6">
                                <label style="margin-bottom: -9px;">Conferma Password</label>
                                <span style="font-size: 9px;{{ $errors->has('confirm_password') ? 'color:red' : '' }}">inserire la password di conferma</span>
                                <input placeholder="Conferma Password" type="password" name="confirm_password" value="{{old('confirm_password')}}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-5">
                                <label style="margin-bottom: -9px;">Sesso</label>
                                <span style="font-size: 9px;{{ $errors->has('gender') ? 'color:red' : '' }}">Seleziona il tuo sesso</span>
                                <span><input type="checkbox" class="checkbox-hide-show" name="gender_privacy" value="1" @if(isset($user->setting) && $user->setting->gender == 1) checked @endif></span>
                                <select class="vendor" name="gender">
                                    <option @if($user->gender == 'Maschio') selected @endif value="Maschio">Maschio</option>
                                    <option @if($user->gender == 'Femmina') selected @endif value="Femmina">Femmina</option>
                                </select>
                            </div>
                            <div class="col-md-5">
                                <label style="margin-bottom: -9px;">Profile Picture</label>
                                <span style="font-size: 9px;{{ $errors->has('photo') ? 'color:red' : '' }}">{{($errors->first('photo'))?:"è richiesta l'immagine del profilo"}}</span>
                                <span><input type="checkbox" class="checkbox-hide-show" name="photo_privacy" value="1" @if(isset($user->setting) && $user->setting->photo == 1) checked @endif></span>
                                <input type="file" name="photo">
                            </div>
                            <div class="col-md-2">
                                @if($user->photo)
                                    <img src="{{asset('uploads/'.$user->photo)}}" style="margin-top: 20px" width="100px" alt="">
                                @else
                                    <img src="{{asset('images/user.png')}}" style="margin-top: 20px" width="80px" alt="">
                                @endif
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col-md-8">
                                <label style="margin-bottom: -9px;">Nome Società</label>
                                <span style="font-size: 9px;{{ $errors->has('company_name') ? 'color:red' : '' }}">Inserisci il nome della tua società</span>
                                <span><input type="checkbox" class="checkbox-hide-show" name="company_name_privacy" value="1" @if(isset($user->setting) && $user->setting->company == 1) checked @endif></span>
                                <input placeholder="Ab Informatica" type="text" name="company_name" value="{{(old('company_name'))?:$user->company_name}}">
                            </div>
                            <div class="col-md-4" style="margin-top: 9px">
                                <label>Forma giuridica</label>
                                <span style="font-size: 9px;{{ $errors->has('about') ? 'color:red' : '' }}"></span>
                                <input placeholder="SRL, SPA, LLC, LTD" type="text" name="about" value="{{(old('about'))?:$user->about}}">
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-md-2"></div>
            </div>

            <div class="row margin-bottom-20">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <input class="button border margin-top-5 login-padding" name="signup" type="submit" value="Aggiorna">
                </div>
                <div class="col-md-2"></div>
            </div>
        </form>
        <!--end of form -->
    </div>


@endsection