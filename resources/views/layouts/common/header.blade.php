<div id="wrapper">
    <!-- Header Container
     ================================================== -->
    <header id="header-container">
        <!-- Header -->
        <div class="container">
            <!-- Left Side Content -->
            <div class="left-side">
                <!-- Logo -->
                <div id="logo">
                    <a href="@if($auth){{url('/reviews/show')}}@else{{url('/')}}@endif"><img alt="" src="{{asset('images/opinionlogo.png')}}"></a>
                </div><!-- Mobile Navigation -->
                <div class="menu-responsive">
                    <i class="fa fa-reorder menu-trigger"></i>
                </div><!-- Main Navigation -->
                <nav class="style-1" id="navigation">
                    <ul id="responsive">
                        @if(!$auth)
                            <li>
                                <a href="{{url('/gestionali-erp')}}">Gestionali ERP</a>
                            </li>
                            <li>
                                <a href="{{url('/business-intelligence')}}">Business Intellingence</a>
                            </li>
                            <li>
                                <a href="{{url('/crm')}}">CRM</a>
                            </li>
                            <li>
                                <a href="{{url('/reviews')}}">Recensioni</a>
                            </li>
                            <li>
                                <a href="{{url('/review')}}">Revisione</a>
                            </li>
                        @else
                            @if($auth->user_type == 2)
                            <li>
                                <a href="{{url('/users')}}">Gestisci Utente</a>
                            </li>
                            <li>
                                <a href="{{url('/reviews/show')}}">Gestisci Le Recensioni</a>
                            </li>
                            <li>
                                <a href="{{url('/contacts')}}">Centro Di Messaggistica</a>
                            </li>
                            @endif

                            @if($auth->user_type == 1)
                            <li>
                                <a href="{{url('/reviews/show')}}">La Mia Recensione</a>
                            </li>
                            <li>
                                <a href="{{url('/review')}}">Revisione</a>
                            </li>
                            <li>
                                <a href="{{url('/contacts')}}">Centro Di Messaggistica</a>
                            </li>
                            @endif
                            <li>
                                <a href="{{url('/users/profile')}}">Profilo</a>
                            </li>
                        @endif
                    </ul>
                </nav><!--<div class="clearfix"></div>
                 <!== Main Navigation / End -->
            </div><!-- Left Side Content / End -->
            <!-- Right Side Content / End -->
            <div class="right-side">
                <div class="header-widget">
                    @if($auth)
                    <a href="{{url('/users/profile')}}">
                        <i class="sl sl-icon-user hidden-xs"></i>
                    </a>
                    &nbsp;&nbsp;<a class="button" href="{{url('/logout')}}">LOGOUT</a>&nbsp; &nbsp;
                    @else
                    <a class="button popup-with-zoom-anim" href="#sign-in-dialog">REGISTRATI</a>&nbsp;
                    @endif
                    <div class="box">
                        <input class="search hidden-xs" placeholder="Cerca" type="search">
                        <div class="icon1">
                            <i class="sl sl-icon-magnifier hidden-xs"></i>
                        </div>
                    </div>
                </div>
            </div><!-- Right Side Content / End -->
        </div>
    </header>
    <div class="clearfix"></div><!-- Header Container / End -->
</div>

<!-- Sign In Popup -->
<div class="zoom-anim-dialog mfp-hide" id="sign-in-dialog">
    <div class="small-dialog-header res-logo" id="auth">
        <div class="col-md-6">
            <a href="{{url('/')}}"><img alt="" src="{{url('images/opinionlogo12.png')}}" style="width: 60%"></a>

            <div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade modal-border" id="exampleModal" role="dialog" tabindex="-1">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"></h5>
                        </div>
                        <div class="modal-body margin-body">
                            <h4 style="color: black;
padding-bottom: 0px;
line-height: 32px;">Sei già un utente di Opinion Software? Clicca qui e registrati adesso.</h4>
                            <a href="{{url('/signup')}}">
                                <div class="email-div">
                                    <i aria-hidden="true" class="fa fa-envelope fb-white"></i> <span class="fb-span">E-mail</span>
                                </div>
                            </a>
                            <br>
                            <p class="term hidden-xxs"><a href="#">Per proseguire confermi di accettare la Normativa sulla Privacy, i termini di utilizzo e linee guida.</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="exampleModal" role="dialog" tabindex="-1">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"></h5>
                        </div>
                        <form id="login_form" v-on:submit.prevent="login('login_form','login')">
                            <div class="modal-body">
                                    <div class="form-group" :class="{'has-error':errors.email}">
                                        <label for="email">Email Address:
                                            <input class="input-text" id="email" name="email" type="email"></label>
                                        <span v-if="errors.email" class="has-error" v-text="errors.email[0]"></span>
                                    </div>
                                    <div class="form-group" :class="{'has-error':errors.password}">
                                        <label for="password">Password:
                                            <input class="input-text" id="password" name="password" type="password"></label>
                                        <span v-if="errors.password" class="has-error" v-text="errors.password[0]"></span><br>
                                        <span class="lost_password"><a href="{{url('password/reset')}}">Hai dimenticato la Password?</a></span>
                                    </div>

                            </div>
                            <div class="modal-footer">
                                <div class="form-row">
                                    <input class="button border margin-top-5 login-padding" name="login" type="submit" value="Login">
                                </div>
                                <span class="term hidden-md hidden-lg hidden-sm"><a href="#">Terms and Conditions Apply*</a></span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!--Tabs -->
        <!-- Sign In Popup / End -->
    </div><!-- Header / End -->
</div>
