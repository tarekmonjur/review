@extends('layouts.layout')
@section('content')

	<div class="main-search-container" style="background:linear-gradient(rgba(0, 14, 13, 0.78), rgba(0, 0, 0, 0.01)), url('images/crm-image.jpg')">
		<div class="main-search-inner">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h2 class="text-white text-center">Scrivi le migliori recensioni sui software CRM.</h2>
						<div class="form-group serach-bar">
							<div class="icon-addon addon-lg">
								<input class="form-control" id="email" placeholder="Nome del gestionale aziendale o della software house che vuoi recensire" type="text"> <label class="fa fa-search" for="email" rel="tooltip" title="email"></label> <button class=" cerca-button button" onclick="window.location.href='#'">Cerca</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div><!-- Content
================================================== -->
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2 class="meglio">Consiglia il meglio. Valuta il meglio. Seleziona il meglio.</h2><br>
				<br>
			</div>
		</div>
		</div>
<div class="container">
		<div class="row">
			<div class="col-md-4 col-sm-4 col-xs-12" onclick="document.location='#'" style="cursor:pointer">
				<div class="icon_border">
					<div class="text-center threeboxe-crm">
						<div class="icon">
							<i aria-hidden="true" class="fa fa-users fa-3x"></i>
						</div>
						<h3>Consiglia gli altri utenti CRM</h3>
						<p>Gli oltre 2.000.000 di utenti che raggiungiamo confidano sulle tue recensioni per avere utili e preziosi consigli sui software CRM</p>
					</div>
				</div>
			</div>
			<div class="col-md-4 col-sm-4 col-xs-12" onclick="document.location='#'" style="cursor:pointer">
				<div class="icon_border">
					<div class="text-center threeboxe-crm">
						<div class="icon">
							<i aria-hidden="true" class="fa fa-pencil-square-o fa-3x"></i>
						</div>
						<h3>Cerca e valuta la tua software house</h3>
						<p>Scopri come su OpinionSoftware è facile recensire anche il tuo fornitore software. Qui puoi contare su una ricerca di oltre 20.000 organizzazioni.</p>
					</div>
				</div>
			</div>
			<div class="col-md-4 col-sm-4 col-xs-12" onclick="document.location='#'" style="cursor:pointer">
				<div class="icon_border">
					<div class="text-center threeboxe-crm">
						<div class="icon">
							<i aria-hidden="true" class="fa fa-shield fa-3x"></i>
						</div>
						<h3>Scrivi le recensioni in tutta tranquillità</h3>
						<p>Siamo indipendenti dalle società di software e dalle società di consulenza. Per questo non siamo influenzabili.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
		<!--End of three box-->
		<br>
		<br>
		<div class="container">
			<div class="background-home-primary text-center central-box-crm">
				<div class="row">
					<div class="col-md-12">
						<img class="margin-top-25" src="images/opinionlogo-white.png" style="width: 20%">
						<h3 class="text-white">Scrivi le tue recensioni sulla più grande community di software gestionali aziendali.</h3>
						<p class="margin-top-5">Consiglia gli altri utenti condividendo le tue esperienze di utilizzo. E' tutto gratis.</p><button class="button margin-bottom-35 margin-top-15 btn-crm">Scrivi una recensione</button>
					</div>
				</div>
			</div>
		</div>
		<div class="container" style="padding-top: 50px;">
			<div class="row">
				<div class="col-md-6 col-sm-6 col-xs-12 ricerche-recensioni-crm">
					<span><strong>Recensioni, ricerche, valutazioni</strong> e tanto<br/>altro su OpinionSoftware, la grande<br/>community dedicata agli utenti dei software<br/>gestionali e dipartimentali.<br/></span>
					<p>Condividi anche tu le esperienze sull'utilizzo dei software aziendali CRM, gli altri utenti attendono di leggere le tue recensioni e i tuoi consigli, anche sulla software house che ti segue.</p><br/>
					<div class="inizia-btn1">
						<button class="btn1" type="button">Inizia</button>
					</div>
				</div>
				<div class="col-md-6 col-sm-6 col-xs-12 padding-right">
					<div class="icon_border">
						<div class="text-center nome-software-home ">
							<div class="icon">
								<i aria-hidden="true" class="fa fa-bar-chart fa-3x"></i>
							</div>
							<div class="crm-footer-box">
								<h3 class="">Cerca il tuo CRM da recensire<br></h3>
								<p>Oltre 200 software di gestione delle relazioni con i clienti</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div><!-- Content
================================================== -->
	<div class="container margin-bottom-35 footer-txt">
		<div class="row">
			<div class="col-md-12">
				<h3 class="margin-top-35 perche">Il sito di recensioni sui gestionali aziendali. Consiglia il meglio. Valuta il meglio. Seleziona il meglio.</h3>
				<p>In OpinionSoftware crediamo che sia l'utente a decidere se il software gestionale che usa per la propria attività sia di facile utilizzo e performante. Abbiamo appositamente creato questo sito per offrirti l'opportunità di scrivere recensioni, dare consigli e condividere le tue esperienze con altri utenti e colleghi. Qui puoi fare ricerche sui nuovi gestionali e nuove software house, puoi anche cercare per zona geografica. Ci teniamo a dirti che OpinionSoftware è indipendente da qualsiasi vendor e per questo non è influenzabile. Scrivere recensioni e fare ricerche è gratuito, per sempre.</p>
			</div>
		</div>
	</div><!-- Footer
================================================== -->
@endsection