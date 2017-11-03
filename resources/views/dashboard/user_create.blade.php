@extends('layouts.layout')
@section('content')

    <div class="container-fluid breadcum-container-pg">
        <div class="row">
            <div class="col md-12 breadcum-pg">
                <h2>Add User</h2>
                Home <i aria-hidden="true" class="fa fa-chevron-right"></i> Create New User
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
        <form method="post" action="{{url('/users/create')}}" enctype="multipart/form-data">
            {{csrf_field()}}

            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <!--inizio form-->
                    <div class="registration-page margin-top-35">

                        <div class="row">
                            <div class="col-md-6">
                                <label style="margin-bottom: -9px;">Il tuo nome e cognome</label>
                                <span style="font-size: 9px;{{ $errors->has('full_name') ? 'color:red' : '' }}">Inserisci il tuo nome completo</span>
                                <input placeholder="Tom Perrin" type="text" name="full_name" value="{{old('full_name')}}">
                            </div>
                            <div class="col-md-6">
                                <label style="margin-bottom: -9px;">Sesso</label>
                                <span style="font-size: 9px;{{ $errors->has('gender') ? 'color:red' : '' }}">Seleziona il tuo sesso</span>
                                <select class="vendor" name="gender">
                                    <option @if(old('full_name') == 'Maschio') selected @endif value="Maschio">Maschio</option>
                                    <option @if(old('full_name') == 'Femmina') selected @endif value="Femmina">Femmina</option>
                                </select>
                            </div>
                        </div>

                        <!--Email-->
                        <div class="row">
                            <div class="col-md-6">
                                <label style="margin-bottom: -9px;">Email aziendale</label>
                                <span style="font-size: 9px;{{ $errors->has('email') ? 'color:red' : '' }}"> Se inserisci un'email privata devi inserire il telefono aziendale</span>
                                <input placeholder="tom@example.com" type="email" name="email" value="{{old('email')}}">
                            </div>
                            <div class="col-md-6">
                                <label style="margin-bottom: -9px;">Il tuo numero</label>
                                <span style="font-size: 9px;{{ $errors->has('mobile_no') ? 'color:red' : '' }}">Telefono aziendale</span>
                                <input placeholder="(123) 123-456" type="text" name="mobile_no" value="{{old('mobile_no')}}">
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
                            <div class="col-md-6">
                                <label style="margin-bottom: -9px;">User Type</label>
                                <span style="font-size: 9px;{{ $errors->has('password') ? 'color:red' : '' }}"> usre type/role</span>
                                <select class="vendor" name="user_type">
                                    <option value="1" @if(old('user_type') == 1) selected @endif >User</option>
                                    <option value="2" @if(old('user_type') == 2) selected @endif >Admin</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label style="margin-bottom: -9px;">Profile Picture</label>
                                <span style="font-size: 9px;{{ $errors->has('photo') ? 'color:red' : '' }}">{{($errors->first('photo'))?:"è richiesta l'immagine del profilo"}}</span>
                                <input type="file" name="photo">
                            </div>
                        </div>
                        <hr>


                        <label style="margin-bottom: -9px;">Nome Società</label>
                        <span style="font-size: 9px;{{ $errors->has('company_name') ? 'color:red' : '' }}">Inserisci il nome della tua società</span>
                        <input placeholder="Ab Informatica" type="text" name="company_name" value="{{old('company_name')}}">

                        <label style="margin-bottom: -9px;">Ruolo</label>
                        <span style="font-size: 9px;{{ $errors->has('about') ? 'color:red' : '' }}">Scrivi il tuo ruolo all'interno della società</span>
                        <input placeholder="IT Manager" type="text" name="about" value="{{old('about')}}">

                    </div>
                </div>

                <div class="col-md-2"></div>
            </div>

            <div class="row margin-bottom-20">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <input class="button border margin-top-5 login-padding" name="signup" type="submit" value="Creare un utente">
                </div>
                <div class="col-md-2"></div>
            </div>
        </form>
        <!--end of form -->
    </div>


@endsection