@extends('layouts.layout')
@section('content')

<div class="container-fluid breadcum-container-pg">
    <div class="row">
        <div class="col md-12 breadcum-pg">
            <h2>Registrazione Opinionsoftware!</h2>
            Home <i aria-hidden="true" class="fa fa-chevron-right"></i> Form
        </div>
    </div>
</div><!--End of breadcrum=-->

<div class="container" id="signup">
    <form method="post" action="{{url('/signup')}}">
        <input type="hidden" name="user_type" value="1">
        {{csrf_field()}}
    <!--fisrt review-->
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
                            <option @if(old('gender') == 'Maschio') selected @endif value="Maschio">Maschio</option>
                            <option @if(old('gender') == 'Femmina') selected @endif value="Femmina">Femmina</option>
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
            <div class="checkboxes in-row margin-bottom-20">
                <input id="check-a" type="checkbox" name="checkCondition" v-model="checkCondition">
                <label for="check-a" style="font-size: xx-small">Per proseguire confermi di accettare la Normativa sulla Privacy, i termini di utilizzo e le linee guida.</label>
            </div>
            <input class="button border margin-top-5 login-padding" :disabled="!checkCondition" name="signup" type="submit" value="Registrati">
        </div>
        <div class="col-md-2"></div>
    </div>
    </form>
    <!--end of form -->

</div>
</div>

@endsection
