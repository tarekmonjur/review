@extends('layouts.layout')
@section('content')

	<div class="main-search-container" style="background:linear-gradient(rgba(0, 14, 13, 0.78), rgba(0, 0, 0, 0.01)), url('images/erp-image.jpg')">
		<div class="main-search-inner">
			<div class="container">
				<div class="row">
					<form action="{{url('/review')}}">
					<div class="col-md-12">
						<h2 class="text-white text-center">Scrivi le migliori recensioni sui gestionali ERP</h2>
						<div class="form-group serach-bar">
							<div class="icon-addon addon-lg">
								<input class="form-control" id="search_vendor_software" name="search_vendor_software" placeholder="Nome del gestionale aziendale o della software house che vuoi recensire" type="text">
								<label class="fa fa-search" for="email" rel="tooltip" title="email"></label>
								<button class="cerca-button button" type="submit">Cerca</button>
							</div>
						</div>
					</div>
					</form>
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
						<h3>Consiglia gli altri utenti ERP</h3>
						<p>Gli oltre 2.000.000 di utenti che raggiungiamo confidano sulle tue recensioni per avere utili e preziosi consigli sui software ERP</p>
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
	</div><br>
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
	<br>
	<br>
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-sm-6 col-xs-12">
				<div class="icon_border">
					<div class="text-center">
						<div class="icon">
							<i aria-hidden="true" class="fa fa-bar-chart fa-3x"></i>
						</div>
						<h3 class="text-center color-primary" style=" font-size: 22px!important; font-weight: 600; line-height: 30px;">Valuta il tuo gestionale ERP da tutti i punti di vista, facilità d'uso, performance e servizio.</h3>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<div class="icon_border">
					<div class="text-center">
						<div class="icon">
							<i aria-hidden="true" class="fa fa-search fa-3x"></i>
						</div>
						<h3 class="text-center color-primary" style=" font-size: 22px!important; font-weight: 600; line-height: 30px;">Approfitta delle ricerche multiple per trovare facilmente il gestionale che usi e dire la tua</h3>
					</div>
				</div>
			</div>
		</div>
	</div><!-- Content
================================================== -->
	<div class="container margin-bottom-35 footer-txt">
		<div class="row">
			<div class="col-md-12">
				<h3 class="margin-top-35 perche">Perchè gli utenti utilizzano i sistemi gestionali ERP</h3>
				<p>I software aziendali ERP sono sempre più diffusi e offrono massima integrazione tra tutte le aree dell'impresa sotto un'unica piattaforma: amministrazione, commerciali, acquisti, produzione e logistica. In un periodo di forte trasformazione digitale, gli utenti cercano soluzioni molto innovative e performanti, fornite da software house e vendor che diano il loro supporto sempre più "live" e qualificato, su più aree di competenza. Su OpinionSoftware puoi cercare e scegliere tra oltre 400 gestionali ERP, cercando ovunque, nella zone più vicina o che preferisci. Puoi anche cercare tra le oltre 12.000 società di software specializzate. Scrivi le tue recensioni o seleziona il tuo gestionale ideale in tutta tranquillità su questo sito, perchè siamo indipendenti da qualsiasi società di software o di consulenza. Per questo non siamo influenzabili.</p>
			</div>
		</div>
	</div><!-- Footer
@endsection