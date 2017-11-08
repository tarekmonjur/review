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
    @if (session('success'))
        <div class="alert alert-success" style="background: green; padding: 10px;color: white; font-weight: bold">
            {{ session('success') }}
        </div>
    @endif

    <!--fisrt review-->
    <div class="row">
        <div class="col-md-8">
            <form method="post" action="{{url('/signup')}}">
                <input type="hidden" name="user_type" value="1">
            {{csrf_field()}}
            <!--inizio form-->
            <div class="registration-page margin-top-35">
                <div class="modal-border">
                <div class="row">
                    <div class="col-md-6">
                        <label style="margin-bottom: -9px;">Il tuo nome</label>
                        <span style="font-size: 9px;{{ $errors->has('first_name') ? 'color:red' : '' }}">Inserisci il tuo nome</span>
                        <input placeholder="Tom" type="text" name="first_name" value="{{old('first_name')}}">
                    </div>
                    <div class="col-md-6">
                        <label style="margin-bottom: -9px;">Il tuo cognome</label>
                        <span style="font-size: 9px;{{ $errors->has('last_name') ? 'color:red' : '' }}">Inserisci il tuo completo</span>
                        <input placeholder="Perrin" type="text" name="last_name" value="{{old('last_name')}}">
                    </div>
                </div>

                <!--Email-->
                <div class="row">
                    <div class="col-md-6">
                        <label style="margin-bottom: -9px;">Email</label>
                        <span style="font-size: 9px;{{ $errors->has('email') ? 'color:red' : '' }}">Non verrà pubblicata</span>
                        <input placeholder="tom@example.com" type="email" name="email" value="{{old('email')}}">
                    </div>
                    <div class="col-md-6">
                        <label style="margin-bottom: -9px;">Contatto telefonico azienda <span style="font-size: 10px;">( rimarrà riservato )</span></label>
                        <span style="font-size: 9px;{{ $errors->has('mobile_no') ? 'color:red' : '' }}">Nunero di rete fissa</span>
                        <input style="margin-bottom: 0px" placeholder="Nunero di rete fissa" type="text" name="mobile_no" value="{{old('mobile_no')}}">
                        <span style="font-size: 9px;">Obbligatorio solo se hai inserito una e-mail non aziendale</span>
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
                        <label style="margin-bottom: -9px;">Nome azienda</label>
                        <span style="font-size: 9px;{{ $errors->has('company_name') ? 'color:red' : '' }}">Società per la quale operi e usi i software gestionali</span>
                        <input style="margin-bottom: 0px" placeholder="Ab Informatica" type="text" name="company_name" value="{{old('company_name')}}">
                        <span style="font-size: 9px;">Potrai scegliere di rendere riservato non pubblicabile</span>
                    </div>
                    <div class="col-md-6" style="margin-top: 9px">
                        <label>Forma giuridica</label>
                        <span style="font-size: 9px;{{ $errors->has('about') ? 'color:red' : '' }}"></span>
                        <input placeholder="SRL, SPA, LLC, LTD" type="text" name="about" value="{{old('about')}}">
                    </div>
                </div>
                </div>

                <div class="row">
                    <div class="col-md-8">
                        <p class="term hidden-xxs" style="color: black!important;">Per proseguire confermi di <br> accettare la
                            <a href="#" style="color: #00a2e8!important;">Normativa sulla Privacy,</a><br>
                            <a href="#" style="color: #00a2e8!important;">i termini di utilizzo</a>
                            e <a href="#" style="color: #00a2e8!important;">le linee guida.</a>
                        </p>
                        <input style="border-radius: 5px"  class="button border margin-top-5 login-padding" :disabled="!checkCondition" name="signup" type="submit" value="Registrati">
                        <div class="checkboxes in-row margin-bottom-20">
                            <input id="check-a" type="checkbox" name="checkCondition" v-model="checkCondition">
                            <label for="check-a" style="font-size: 13px">Si desidero ricevere informazioni per suggerimenti e nuove funzionalita di OpinionSoftware. Posso annullare questa richiesta in quaisiasi mmonento.</label>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>


        <div class="col-md-4" id="auth">
            <form action="{{url('/login')}}" method="post">
                {{csrf_field()}}
                <div class="modal-body">
                    <h3 style="color: black!important;">sei già un membro di Opinione Software?</h3>
                    <div class="form-group {{ $errors->has('login_email') ? 'has-error' : '' }}">
                        <label for="login_email">Indirizzo email:
                        <input class="input-text" id="login_email" name="login_email" type="email" value="{{old('login_email')}}"></label>
                        <span class="has-error">{{$errors->first('login_email')}}</span>
                    </div>
                    <div class="form-group {{ $errors->has('login_password') ? 'has-error' : '' }}">
                        <label for="login_password">Password:
                            <input class="input-text" id="login_password" name="login_password" type="password"></label>
                        <span class="has-error">{{$errors->first('login_password')}}</span><br>
                        <span class="lost_password"><a style="color: #00a2e8!important;" href="{{url('password/reset')}}">Password dimenticate?</a></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="form-row">
                        <input style="border-radius: 5px;" class="button border margin-top-5 login-padding" name="login_submit" type="submit" value="Accedi">
                    </div>
                    <span class="term hidden-md hidden-lg hidden-sm"><a href="#">Terms and Conditions Apply*</a></span>
                </div>
            </form>
        </div>
    </div>

    <!--end of form -->



</div>
</div>

@endsection
