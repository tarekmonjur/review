@extends('layouts.layout')
@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h3 class="margin-top-75 perche">La tua esperienza personale può essere di grande aiuto agli altri Utenti.<br>
				Grazie!</h3>
			<hr>
		</div>
	</div>
</div>

<form action="{{url('reviews/create')}}" method="post">
	{{csrf_field()}}
<div class="container">
	<div class="row">
		<div class="col-md-9">
			@if (session('error'))
				<div class="alert alert-danger" style="background: red; padding: 10px;color: white; font-weight: bold">
					{{ session('error') }}
				</div>
			@endif
			<div class="struct">
				<h5>Scegli il gestionale o la tua software house</h5><br>
			</div>

				<?php
					$vendor_id = isset($vendor_id)?$vendor_id:old('vendor');
					$software_id = isset($software_id)?$software_id:old('software');
				?>

			<div class="col-md-8">
				<div class="row">
					<div class="col-md-6 col-xs-12{{ $errors->has('software') ? ' has-error' : '' }}">
						<select class="vendor" name="software">
							<option value="">---Select Software---</option>
							@foreach($softwares as $software)
								<option value="{{$software->id}}" @if($software_id == $software->id) selected @endif>{{$software->software_name}}</option>
							@endforeach
						</select>
						<span class="has-error">{{$errors->first('software')}}</span>
					</div>
					<div class="col-md-6 col-xs-12{{ $errors->has('vendor') ? ' has-error' : '' }}">
						<select class="vendor" name="vendor">
							<option value="">---Select Vendor---</option>
							@foreach($vendors as $vendor)
								<option value="{{$vendor->id}}" @if($vendor_id == $vendor->id) selected @endif>{{$vendor->name}}</option>
							@endforeach
						</select>
						<span class="has-error">{{$errors->first('vendor')}}</span>
					</div>
				</div><br>
			</div>
		</div>
		<div class="col-md-3">
			<div class="review-bozza">
				<h5>Bozza salvata alle {{date('H:i')}}.</h5>
			</div>
		</div>
	</div>
</div><br>

<div class="container">
	<div class="row">
		<div class="col-md-8">
			<div class="struct">
				<h5>Il tuo punteggio complessivo per questo software</h5><br>
			</div>
			<div class="col-md-3">
				<div class="radio-blue">
					<div class="inline-radio voting">
						<input name='software_score' type='radio' value="1" @if(old('software_score') == '1') checked @endif class="voting">&nbsp;
						<input name='software_score' type='radio' value="2" @if(old('software_score') == '2') checked @endif class="voting">&nbsp;
						<input name='software_score' type='radio' value="3" @if(old('software_score') == '3') checked @endif class="voting">&nbsp;
						<input name='software_score' type='radio' value="4" @if(old('software_score') == '4') checked @endif class="voting">&nbsp;
						<input name='software_score' type='radio' value="5" @if(old('software_score') == '5') checked @endif class="voting">&nbsp;
					</div>
				</div>
			</div>
			<div class="col-md-5">
				<div class="redbox">
					<b>Molto buono</b>
				</div>
			</div>
			<span class="has-error">{{$errors->first('software_score')}}</span>
		</div>
		<div class="col-md-4"></div>
	</div>
</div><br>

<div class="container">
	<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
		<label class="control-label" for="title">Titolo della tua recensione</label>
		<div class="height-form">
			<textarea class="form-control" id="title" name="title" placeholder="Riassumi tua visita o concentrati dettaglio interessante">{{old('title')}}</textarea>
			<span class="has-error">{{$errors->first('title')}}</span>
		</div>
	</div><br>
	<div class="form-group">
		<label class="control-label col-md-6" for="description" style="padding-left: 0px">La tua recensione</label>
		<div class="left-text col-md-6">
			Consigli per scrivere una buona recensione
		</div>
		<textarea class="form-control" id="description" name="description" placeholder="Racconta agli utenti la tua esperienza sul gestionale aziendale e sui servizi di assistenza">{{old('description')}}</textarea>
	</div>
</div><br>

<div class="container">
	<div class="row">
		<div class="col-md-8">
			<h5 class="perche">Valutazione della software house e del prodotto</h5>
		</div>
	</div>
</div><br>

<div class="container">
	<div class="row">
		<div class="col-md-8">
			<div class="col-md-4 struct">
				<h5>Facilita di utilizzo</h5>
				<span class="has-error">{{$errors->first('easy_use_score')}}</span>
			</div>
			<div class="col-md-3">
				<div class="radio-blue">
					<div class="inline-radio ">
						<input name='easy_use_score' value="1" type='radio' @if(old('easy_use_score') == '1') checked @endif >&nbsp;
						<input name='easy_use_score' value="2" type='radio' @if(old('easy_use_score') == '2') checked @endif >&nbsp;
						<input name='easy_use_score' value="3" type='radio' @if(old('easy_use_score') == '3') checked @endif >&nbsp;
						<input name='easy_use_score' value="4" type='radio' @if(old('easy_use_score') == '4') checked @endif >&nbsp;
						<input name='easy_use_score' value="5" type='radio' @if(old('easy_use_score') == '5') checked @endif >&nbsp;
					</div>
				</div>
			</div>
			<div class="col-md-5">
				<div class="redbox">
					<b>Vota ora!</b>
				</div>
			</div>
		</div>
		<div class="col-md-4"></div>
	</div>
</div><br>

<div class="container">
	<div class="row">
		<div class="col-md-8">
			<div class="col-md-4 struct">
				<h5>Tempi di implementazione</h5>
				<span class="has-error">{{$errors->first('implementation_score')}}</span>
			</div>
			<div class="col-md-3">
				<div class="radio-blue">
					<div class="inline-radio">
						<input name='implementation_score' type='radio' value="1" @if(old('implementation_score') == '1') checked @endif>&nbsp;
						<input name='implementation_score' type='radio' value="2" @if(old('implementation_score') == '2') checked @endif>&nbsp;
						<input name='implementation_score' type='radio' value="3" @if(old('implementation_score') == '3') checked @endif>&nbsp;
						<input name='implementation_score' type='radio' value="4" @if(old('implementation_score') == '4') checked @endif>&nbsp;
						<input name='implementation_score' type='radio' value="5" @if(old('implementation_score') == '5') checked @endif>&nbsp;
					</div>
				</div>
			</div>
			<div class="col-md-5">
				<div class="redbox">
					<b>Vota ora!</b>
				</div>
			</div>
		</div>
		<div class="col-md-4"></div>
	</div>
</div><br>

<div class="container">
	<div class="row">
		<div class="col-md-8">
			<div class="col-md-4 struct">
				<h5>Servizi tecnici</h5>
				<span class="has-error">{{$errors->first('technical_score')}}</span>
			</div>
			<div class="col-md-3">
				<div class="radio-blue">
					<div class="inline-radio">
						<input name='technical_score' type='radio' value="1" @if(old('technical_score') == '1') checked @endif>&nbsp;
						<input name='technical_score' type='radio' value="2" @if(old('technical_score') == '2') checked @endif>&nbsp;
						<input name='technical_score' type='radio' value="3" @if(old('technical_score') == '3') checked @endif>&nbsp;
						<input name='technical_score' type='radio' value="4" @if(old('technical_score') == '4') checked @endif>&nbsp;
						<input name='technical_score' type='radio' value="5" @if(old('technical_score') == '5') checked @endif>&nbsp;
					</div>
				</div>
			</div>
			<div class="col-md-5">
				<div class="redbox">
					<b>Vota ora!</b>
				</div>
			</div>
		</div>
		<div class="col-md-4"></div>
	</div>
</div><br>

<div class="container">
	<div class="row">
		<div class="col-md-8">
			<div class="col-md-4 struct">
				<h5>Miglioramenti ottenuti</h5>
				<span class="has-error">{{$errors->first('update_score')}}</span>
			</div>
			<div class="col-md-3">
				<div class="radio-blue">
					<div class="inline-radio">
						<input name='update_score' type='radio' value="1" @if(old('update_score') == '1') checked @endif >&nbsp;
						<input name='update_score' type='radio' value="2" @if(old('update_score') == '2') checked @endif >&nbsp;
						<input name='update_score' type='radio' value="3" @if(old('update_score') == '3') checked @endif >&nbsp;
						<input name='update_score' type='radio' value="4" @if(old('update_score') == '4') checked @endif >&nbsp;
						<input name='update_score' type='radio' value="5" @if(old('update_score') == '5') checked @endif >&nbsp;
					</div>
				</div>
			</div>
			<div class="col-md-5">
				<div class="redbox">
					<b>Vota ora!</b>
				</div>
			</div>
		</div>
		<div class="col-md-4"></div>
	</div>
	<hr>
</div><br>

<div class="container">
	<div class="row">
		<div class="col-md-12 struct">
			<h5>Invia la tua recensione</h5>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="avatar1">
				<div class="checkbox">
					<label><input type="checkbox" name="policy" value="1"></label>
					<div class="review-ltext">
						Dichiaro che questa recensione e frutto della mia esperienza, che rappresenta la mila opinione sincera e di non avere relazioni personali o professionali con tale fornitore Non mi sono stati offerti incentivi o pagamenti per scrivere questa recensione. Comprendo che attua una politica o tolleranza uro per le recensioni mendaci. <span class="review-blue">Maggiori informazioni</span>
					</div>
					<span class="has-error">{{$errors->first('policy')}}</span>
				</div>
			</div>
		</div>
	</div>
</div><br>

<div class="container">
	<div class="row">
		<div class="col-md-3">
			@if($auth)
				<input class="btn3 btn-info" type="submit" value="Invia la tua recensione">
			@else
				<a onclick="window.redirect='review'" class="btn3 btn-info popup-with-zoom-anim" href="#sign-in-dialog" style="padding: 15px">Invia la tua recensione</a>
			@endif
		</div>
		<div class="col-md-3 struct">
			<h5>Anteprima recensione</h5>
		</div>
		<div class="col-md-6"></div>
	</div>
</div><br>
</form>

@endsection

