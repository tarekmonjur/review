@extends('layouts.layout')
@section('content')

<div id="review">
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
			<div class="col-md-4">
				<div class="radio-blue">
					<div class="inline-radio voting">
						<div class="checkbox1">
							<input id="software_score1" :checked="software_score >=1" v-on:click="softwareScore" type='checkbox' value="1" class="voting">
							<label for="software_score1"></label>
						</div>
						<div class="checkbox1">
							<input id="software_score2" :checked="software_score >=2" v-on:click="softwareScore" type='checkbox' value="2" class="voting">
							<label for="software_score2"></label>
						</div>
						<div class="checkbox1">
							<input id="software_score3" :checked="software_score >=3" v-on:click="softwareScore" type='checkbox' value="3" class="voting">
							<label for="software_score3"></label>
						</div>
						<div class="checkbox1">
							<input id="software_score4" :checked="software_score >=4" v-on:click="softwareScore" type='checkbox' value="4" class="voting">
							<label for="software_score4"></label>
						</div>
						<div class="checkbox1">
							<input id="software_score5" :checked="software_score >=5" v-on:click="softwareScore" type='checkbox' value="5" class="voting">
							<label for="software_score5"></label>
						</div>
						<input type="hidden" :value="software_score" name="software_score">
					</div>
				</div>
			</div>
			<div class="col-md-5">
				<div class="redbox">
					<b v-text="software_score_msg"></b>
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
					<div class="inline-radio">
						<div class="checkbox">
							<input id="easy_use_score_1" :checked="easy_use_score >=1" v-on:click="easyUseScore" type='checkbox' value="1">
							<label for="easy_use_score_1"></label>
						</div>
						<div class="checkbox">
							<input  id="easy_use_score_2" :checked="easy_use_score >=2" v-on:click="easyUseScore" type='checkbox' value="2">
							<label for="easy_use_score_2"></label>
						</div>
						<div class="checkbox">
							<input  id="easy_use_score_3" :checked="easy_use_score >=3" v-on:click="easyUseScore" type='checkbox' value="3">
							<label for="easy_use_score_3"></label>
						</div>
						<div class="checkbox">
							<input  id="easy_use_score_4" :checked="easy_use_score >=4" v-on:click="easyUseScore" type='checkbox' value="4">
							<label for="easy_use_score_4"></label>
						</div>
						<div class="checkbox">
							<input id="easy_use_score_5" :checked="easy_use_score >=5" v-on:click="easyUseScore" type='checkbox' value="5">
							<label for="easy_use_score_5"></label>
						</div>
						<input type="hidden" :value="easy_use_score" name="easy_use_score">
					</div>
				</div>
			</div>
			<div class="col-md-5">
				<div class="redbox">
					<b v-text="easy_use_score_msg"></b>
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
						<div class="checkbox">
							<input id="implementation_score_1" :checked="implementation_score >=1" v-on:click="implementationScore" type='checkbox' value="1">
							<label for="implementation_score_1"></label>
						</div>
						<div class="checkbox">
							<input id="implementation_score_2" :checked="implementation_score >=2" v-on:click="implementationScore" type='checkbox' value="2">
							<label for="implementation_score_2"></label>
						</div>
						<div class="checkbox">
							<input id="implementation_score_3" :checked="implementation_score >=3" v-on:click="implementationScore" type='checkbox' value="3">
							<label for="implementation_score_3"></label>
						</div>
						<div class="checkbox">
							<input id="implementation_score_4" :checked="implementation_score >=4" v-on:click="implementationScore" type='checkbox' value="4">
							<label for="implementation_score_4"></label>
						</div>
						<div class="checkbox">
							<input id="implementation_score_5" :checked="implementation_score >=5" v-on:click="implementationScore" type='checkbox' value="5">
							<label for="implementation_score_5"></label>
						</div>
						<input type="hidden" :value="implementation_score" name="implementation_score">
					</div>
				</div>
			</div>
			<div class="col-md-5">
				<div class="redbox">
					<b v-text="implementation_score_msg"></b>
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
						<div class="checkbox">
							<input id="technical_score_1" :checked="technical_score >=1" v-on:click="technicalScore" type='checkbox' value="1">
							<label for="technical_score_1"></label>
						</div>
						<div class="checkbox">
							<input id="technical_score_2" :checked="technical_score >=2" v-on:click="technicalScore" type='checkbox' value="2">
							<label for="technical_score_2"></label>
						</div>
						<div class="checkbox">
							<input id="technical_score_3" :checked="technical_score >=3" v-on:click="technicalScore" type='checkbox' value="3">
							<label for="technical_score_3"></label>
						</div>
						<div class="checkbox">
							<input id="technical_score_4" :checked="technical_score >=4" v-on:click="technicalScore" type='checkbox' value="4">
							<label for="technical_score_4"></label>
						</div>
						<div class="checkbox">
							<input id="technical_score_5" :checked="technical_score >=5" v-on:click="technicalScore" type='checkbox' value="5">
							<label for="technical_score_5"></label>
						</div>
						<input type="hidden" :value="technical_score" name="technical_score">
					</div>
				</div>
			</div>
			<div class="col-md-5">
				<div class="redbox">
					<b v-text="technical_score_msg"></b>
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
						<div class="checkbox">
							<input id="update_score1" :checked="update_score >=1" v-on:click="updateScore" type='checkbox' value="1">
							<label for="update_score1"></label>
						</div>
						<div class="checkbox">
							<input id="update_score2" :checked="update_score >=2" v-on:click="updateScore" type='checkbox' value="2">
							<label for="update_score2"></label>
						</div>
						<div class="checkbox">
							<input id="update_score3" :checked="update_score >=3" v-on:click="updateScore" type='checkbox' value="3">
							<label for="update_score3"></label>
						</div>
						<div class="checkbox">
							<input id="update_score4" :checked="update_score >=4" v-on:click="updateScore" type='checkbox' value="4">
							<label for="update_score4"></label>
						</div>
						<div class="checkbox">
							<input id="update_score5" :checked="update_score >=5" v-on:click="updateScore" type='checkbox' value="5">
							<label for="update_score5"></label>
						</div>

						<input type="hidden" :value="update_score" name="update_score">
					</div>
				</div>
			</div>
			<div class="col-md-5">
				<div class="redbox">
					<b v-text="update_score_msg"></b>
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
	<br>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="avatar1">
				<div class="checkbox">
					<label for=""><input type="checkbox" name="policy" value="1" style="position: unset!important; left: 0!important;"></label>
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
</div>
@endsection

@section('script')
	<script>
		new Vue({
			el: '#review',
			data:{
                software_score: null,
                easy_use_score: null,
                implementation_score: null,
                technical_score: null,
                update_score: null,

                software_score_msg: 'Vota ora!',
                easy_use_score_msg: 'Vota ora!',
                implementation_score_msg: 'Vota ora!',
                technical_score_msg: 'Vota ora!',
                update_score_msg: 'Vota ora!',
			},

			methods:{
			    calAverage(){
			        if(this.easy_use_score){
			            var easy_use_score = this.easy_use_score;
					}else{
			            var easy_use_score = 0;
					}
                    if(this.implementation_score){
                        var implementation_score = this.implementation_score;
                    }else{
                        var implementation_score = 0;
                    }
                    if(this.technical_score){
                        var technical_score = this.technical_score;
                    }else{
                        var technical_score = 0;
                    }
                    if(this.update_score){
                        var update_score = this.update_score;
                    }else{
                        var update_score = 0;
                    }
                    this.software_score = Math.ceil((parseInt(easy_use_score) + parseInt(implementation_score) + parseInt(technical_score) + parseInt(update_score)) / 4);
					console.log(this.software_score, this.easy_use_score);
				},

                softwareScore(e){
                    var item = e.target.value;
                    this.software_score = item;
                    if(item == 1){
                        if(e.target.checked == true){
                            this.software_score_msg = "E 'stato oops";
						}else{
                            this.software_score_msg = "Vota ora!";
                            this.software_score = null;
						}
                    }else if(item == 2){
                        this.software_score_msg = "Lascia qualcosa per essere desiderato";
                    }else if(item == 3){
                        this.software_score_msg = "Non mi ha sorpreso";
                    }else if(item == 4){
                        this.software_score_msg = "mi piaceva";
                    }else if(item == 5){
                        this.software_score_msg = "It's the best!";
                    }
                },
                easyUseScore(e){
                    var item = e.target.value;
                    this.easy_use_score = item;
                    if(item == 1){
                        if(e.target.checked == true){
                            this.easy_use_score_msg = "E 'stato oops";
                        }else{
                            this.easy_use_score_msg = "Vota ora!";
                            this.easy_use_score = null;
                        }
                    }else if(item == 2){
                        this.easy_use_score_msg = "Lascia qualcosa per essere desiderato";
                    }else if(item == 3){
                        this.easy_use_score_msg = "Non mi ha sorpreso";
                    }else if(item == 4){
                        this.easy_use_score_msg = "mi piaceva";
                    }else if(item == 5){
                        this.easy_use_score_msg = "It's the best!";
                    }
                    this.calAverage();
                },
                implementationScore(e){
                    var item = e.target.value;
                    this.implementation_score = item;
                    if(item == 1){
                        if(e.target.checked == true){
                            this.implementation_score_msg = "E 'stato oops";
                        }else{
                            this.implementation_score_msg = "Vota ora!";
                            this.implementation_score = null;
                        }
                    }else if(item == 2){
                        this.implementation_score_msg = "Lascia qualcosa per essere desiderato";
                    }else if(item == 3){
                        this.implementation_score_msg = "Non mi ha sorpreso";
                    }else if(item == 4){
                        this.implementation_score_msg = "mi piaceva";
                    }else if(item == 5){
                        this.implementation_score_msg = "It's the best!";
                    }
                    this.calAverage();
                },
                technicalScore(e){
                    var item = e.target.value;
                    this.technical_score = item;
                    if(item == 1){
                        if(e.target.checked == true){
                            this.technical_score_msg = "E 'stato oops";
                        }else{
                            this.technical_score_msg = "Vota ora!";
                            this.technical_score = null;
                        }
                    }else if(item == 2){
                        this.technical_score_msg = "Lascia qualcosa per essere desiderato";
                    }else if(item == 3){
                        this.technical_score_msg = "Non mi ha sorpreso";
                    }else if(item == 4){
                        this.technical_score_msg = "mi piaceva";
                    }else if(item == 5){
                        this.technical_score_msg = "It's the best!";
                    }
                    this.calAverage();
                },
                updateScore(e){
                    var item = e.target.value;
                    this.update_score = item;
                    if(item == 1){
                        if(e.target.checked == true){
                            this.update_score_msg = "E 'stato oops";
                        }else{
                            this.update_score_msg = "Vota ora!";
                            this.update_score = null;
                        }
                    }else if(item == 2){
                        this.update_score_msg = "Lascia qualcosa per essere desiderato";
                    }else if(item == 3){
                        this.update_score_msg = "Non mi ha sorpreso";
                    }else if(item == 4){
                        this.update_score_msg = "mi piaceva";
                    }else if(item == 5){
						this.update_score_msg = "It's the best!";
                    }
                    this.calAverage();
                }
			}
		});
	</script>
@endsection
