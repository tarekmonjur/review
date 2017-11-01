@extends('layouts.layout')
@section('content')

	<div class="main-search-container" style="background:linear-gradient(rgba(0, 14, 13, 0.78), rgba(0, 0, 0, 0.01)), url('images/homepage.png')">
		<div class="main-search-inner">
			<div class="container">
				<form action="{{url('/review')}}">
				<div class="row">
					<div class="col-md-12">
						<h2 class="text-white text-center">Recensioni sui gestionali che usi. Dì la tua, sempre.</h2>
						<div class="form-group serach-bar">
							<div class="icon-addon addon-lg">
								<input class="form-control" id="search_vendor_software" name="search_vendor_software" placeholder="Nome del gestionale aziendale o della software house che vuoi recensire" type="text">
								<label class="fa fa-search" for="email" rel="tooltip" title="email"></label>
								<button class="cerca-button button" type="submit">Cerca</button>
							</div>
						</div>
					</div>
				</div>
				</form>
			</div>
		</div>
	</div><!-- Content
================================================== -->
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<p class="cerca1">Cerca il tuo gestionale e dai i migliori consigli</p>
				<p>Monitoriamo oltre 1000 siti per farti trovare velocemente e<br>
				facilmente il tuo gestionale e la tua software house da recensire</p><!--Start here the review -->
				<h3 class="margin-top-35 perche1">Cosa dicono gli utenti sui gestionali</h3>
				<section class="comments listing-reviews">
					<ul>
						<li>
							<div class="avatar">
							<div class="checkbox-box-img">
								<i aria-hidden="true" class="fa fa-check-square-o"></i>
							</div><img alt="" src="images/avatar2.png"></div>
							<div class="comment-content">
								<div class="arrow-comment"></div><span style="color: black;"><span style="font-size:20px; color: black; font-wight:700;"><b>SAP R3</b></span> "Molto completo e performante"</span>
								<div class="comment-by" style="margin-top: -7px;">
									<img class="bullet-home" src="images/icons23.png"><img class="bullet-home" src="images/icons23.png"><img class="bullet-home" src="images/icons23.png"><img class="bullet-home" src="images/icons23.png"><img src="images/icons23.png"> da Simone (CO)
								</div>
								<p></p>
							</div>
						</li>
						<li>
							<div class="avatar">
							<div class="checkbox-box-img">
								<i aria-hidden="true" class="fa fa-check-square-o"></i>
							</div><img alt="" src="images/users-home.png"></div>
							<div class="comment-content">
								<div class="arrow-comment"></div><span style="color: black;"><span style="font-size:20px; color: black; font-wight:700;"><b>Dynamic Nav</b></span> "Contabilità migliorabile"</span>
								<div class="comment-by" style="margin-top: -7px;">
									<img class="bullet-home" src="images/icons23.png"><img class="bullet-home" src="images/icons23.png"><img class="bullet-home" src="images/icons23.png"><img class="bullet-home" src="images/icons23.png"><img src="images/icons23.png"> da Elisabetta Morrison (NA)
								</div>
								<p></p>
							</div>
						</li>
						<li class="reviews-last">
							<div class="avatar">
							<div class="checkbox-box-img">
								<i aria-hidden="true" class="fa fa-check-square-o"></i>
							</div><img alt="" src="images/avatar1.png"></div>
							<div class="comment-content">
								<div class="arrow-comment"></div><span style="color: black;"><span style="font-size:20px; color: black; font-wight:700;"><b>Ad Hoc</b></span> Gestionale Oky, l'assistenza meno</span>
								<div class="comment-by" style="margin-top: -7px;">
									<img class="bullet-home" src="images/icons23.png"><img class="bullet-home" src="images/icons23.png"><img class="bullet-home" src="images/icons23.png"><img class="bullet-home" src="images/icons23.png"><img src="images/icons23.png"> da Gabriele B. (BO)
								</div>
								<p></p>
							</div>
						</li>
					</ul>
				</section><!--end of review -->
			</div>
			<div class="col-md-6 text-white margin-bottom-20 box-scrivisu">
				<div class="background-home-primary">
					<h3 class="margin-top-45 text-white">Scrivi recensioni sui gestionali aziendali che usi su OpinionSoftware. E' gratis</h3>
					<p>Hai a disposizione una ricerca di oltre <b>600</b> gestionali aziendali, per aiutarti trovare il tuo e condividere da subito la tua esperienza</p><a href="#">Scrivi una recensione <i class="text-white1 sl sl-icon-arrow-right"></i></a>
				</div>
			</div>
			<div class="col-md-6">
				<div class="box-home-reg">
					<p>Raggiungiamo oltre 2.000.000 di utenti di<br>
					software gestionali per far conoscere e<br>
					condividere le tue migliori recensioni.</p><img alt="" class="margin-left" src="images/opinionlogo.png" width="30%"><br>
					<br>
				</div>
			</div>
		</div>
	</div><!-- Fullwidth Section -->
	<section class="fullwidth margin-top-35 padding-bottom-70">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h3 class="perche">Cerca il gestionale che vuoi recensire per tipologia. Guadagna tempo</h3>
					<p>Cerchi il tuo gestionale da recensire per area di competenza? Allora sei nel posto giusto. Mostriamo oltre 1000 siti di software aziendali<br>
					per farti trovare sempre gli utili aggiornamenti. Trovi tutto su questo sito, su OpinionSoftware.</p>
				</div>
			</div>
		</div>
	</section>
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-sm-4 col-xs-12" onclick="document.location='#'" style="cursor:pointer">
				<div class="icon_border">
					<div class="text-center nome-software-home">
						<div class="icon">
							<i aria-hidden="true" class="fa fa-cloud fa-3x"></i>
						</div>
						<h3>Gestionali ERP</h3><span>+ 428 (Italia + EU)</span>
					</div>
				</div>
			</div>
			<div class="col-md-4 col-sm-4 col-xs-12" onclick="document.location='#'" style="cursor:pointer">
				<div class="icon_border">
					<div class="text-center nome-software-home">
						<div class="icon">
							<i aria-hidden="true" class="fa fa-bullseye fa-3x"></i>
						</div>
						<h3>Software CRM</h3><span>+ 246 (Italia + EU)</span>
					</div>
				</div>
			</div>
			<div class="col-md-4 col-sm-4 col-xs-12" onclick="document.location='#'" style="cursor:pointer">
				<div class="icon_border">
					<div class="text-center nome-software-home">
						<div class="icon">
							<i aria-hidden="true" class="fa fa-bar-chart fa-3x"></i>
						</div>
						<h3>Business Intelligence</h3><span>+ 116 (Italia + EU)</span>
					</div>
				</div>
			</div>
		</div>
	</div><!-- Fullwidth Section / End -->
	<!-- Content
================================================== -->
	<div class="container margin-bottom-35 footer-txt">
		<div class="row">
			<div class="col-md-12">
				<h3 class="margin-top-75 perche">Il sito di recensioni sui gestionali aziendali. Consiglia il meglio. Valuta il meglio. Seleziona il meglio.</h3>
				<p>In OpinionSoftware crediamo che sia l'utente a decidere se il software gestionale che usa per la propria attività sia di facile utilizzo e performante. Abbiamo appositamente creato questo sito per offrirti l'opportunità di scrivere recensioni, dare consigli e condividere le tue esperienze con altri utenti e colleghi. Qui puoi fare ricerche sui nuovi gestionali e nuove software house, puoi anche cercare per zona geografica. Ci teniamo a dirti che OpinionSoftware è indipendente da qualsiasi vendor e per questo non è influenzabile. Scrivere recensioni e fare ricerche è gratuito, per sempre.</p>
			</div>
		</div>
	</div>
	<!-- Footer
================================================== -->
@endsection