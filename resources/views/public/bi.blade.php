@extends('layouts.layout')
@section('content')

	<div class="main-search-container" style="background:linear-gradient(rgba(0, 14, 13, 0.78), rgba(0, 0, 0, 0.01)), url('images/bs-image.jpg')">
		<div class="main-search-inner">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h2 class="text-white text-center">Esprimiti sul tuo software di Business Intelligence</h2>
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
							<i aria-hidden="true" class="fa fa-bar-chart fa-3x"></i>
						</div>
						<h3>Trova la tua Business Intelligence</h3>
						<p>Scrivi le tue recensioni sul software BI che utilizzi e condividile con gli altri utenti, sei nel posto giusto.</p>
					</div>
				</div>
			</div>
			<div class="col-md-4 col-sm-4 col-xs-12" onclick="document.location='#'" style="cursor:pointer">
				<div class="icon_border">
					<div class="text-center threeboxe-crm">
						<div class="icon">
							<i aria-hidden="true" class="fa fa-building fa-3x"></i>
						</div>
						<h3>Cerca e valuta la tua software house</h3>
						<p>Scopri come su OpinionSoftware è facile recensire anche il tuo fornitore software.</p>
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
<!--BluBox-->
<div class="container margin-top-25">
                <div class="bg_color">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="text_color blu-box-bi">
                                <h2>Trova facilmente il gestionale che usi </h2>
                                <h3>Scegli cosa vuoi recensire</h3>
                                <p>Puoi scrivere recensioni sui software gestionali che usi ma anche sulla società informatica che te li ha forniti o che ti supporta a livello tecnico </p>
                                <h3>Effettua ricerche mirate</h3>
                                <p>Nei campi di ricerca del sito puoi digitare il nome esatto o parziale, del tuo software gestionale che vuoi recensire e ricevere i risultati in un attimo. </p>
                                <h3>Cerca gestionali di tutto il mondo in pochi secondi</h3>
                                <p>Con oltre ottocento software aziendali ricercabili su OpinionSoftware trovi il tuo gestionale internazionale </p>
                                <div class="inizia-bt" style="padding-top: 5px; padding-left: 20px;">
                                    <button type="button" class="btn1">Inizia</button>
                                </div>
                                <br>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <br>
                            <br>
                            <br>
                            <div class="fright">
                                <div class="block1">
                                    <h5>Gestionali ERP </h5>
                                </div>
                                <br>
                                <div class="block1">
                                    <h5>CRM</h5>
                                </div>
                                <br>
                                <div class="block1">
                                    <h5>Business Intelligence</h5>
                                </div>
                                <br>
                                <div class="block1">
                                    <h5>Gestione documentale</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<!-- Content
================================================== -->
	<div class="container margin-bottom-35 footer-txt">
		<div class="row">
			<div class="col-md-12">
				<h3 class="margin-top-35 perche">Il sito di recensioni sui gestionali aziendali. Consiglia il meglio. Valuta il meglio. Seleziona il meglio.</h3>
				<p>In OpinionSoftware crediamo che sia l'utente a decidere se il software gestionale che usa per la propria attività sia di facile utilizzo e performante. Abbiamo appositamente creato questo sito per offrirti l'opportunità di scrivere recensioni, dare consigli e condividere le tue esperienze con altri utenti e colleghi. Qui puoi fare ricerche sui nuovi gestionali e nuove software house, puoi anche cercare per zona geografica. Ci teniamo a dirti che OpinionSoftware è indipendente da qualsiasi vendor e per questo non è influenzabile. Scrivere recensioni e fare ricerche è gratuito, per sempre.</p>
			</div>
		</div>
	</div>
<!-- Footer
================================================== -->
@endsection