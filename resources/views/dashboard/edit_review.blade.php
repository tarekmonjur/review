@extends('layouts.layout')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="margin-top-75 perche">Aggiorna la tua recensione.</h3>
                <hr>
            </div>
        </div>
    </div>

    <form action="{{url('reviews/edit')}}" method="post">
        {{csrf_field()}}
        <input type="hidden" name="id" value="{{$review->id}}">
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

                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-6 col-xs-12{{ $errors->has('software') ? ' has-error' : '' }}">
                                <select class="vendor" name="software">
                                    <option value="">---Select Software---</option>
                                    @foreach($softwares as $software)
                                        <option value="{{$software->id}}" @if($review->software_id == $software->id) selected @endif>{{$software->software_name}}</option>
                                    @endforeach
                                </select>
                                <span class="has-error">{{$errors->first('software')}}</span>
                            </div>
                            <div class="col-md-6 col-xs-12{{ $errors->has('vendor') ? ' has-error' : '' }}">
                                <select class="vendor" name="vendor">
                                    <option value="">---Select Vendor---</option>
                                    @foreach($vendors as $vendor)
                                        <option value="{{$vendor->id}}" @if($review->vendor_id == $vendor->id) selected @endif>{{$vendor->name}}</option>
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
                                <input name='software_score' type='radio' value="1" @if($review->software_score == '1') checked @endif class="voting">&nbsp;
                                <input name='software_score' type='radio' value="2" @if($review->software_score == '2') checked @endif class="voting">&nbsp;
                                <input name='software_score' type='radio' value="3" @if($review->software_score == '3') checked @endif class="voting">&nbsp;
                                <input name='software_score' type='radio' value="4" @if($review->software_score == '4') checked @endif class="voting">&nbsp;
                                <input name='software_score' type='radio' value="5" @if($review->software_score == '5') checked @endif class="voting">&nbsp;
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
                    <textarea class="form-control" id="title" name="title" placeholder="Riassumi tua visita o concentrati dettaglio interessante">{{$review->title}}</textarea>
                    <span class="has-error">{{$errors->first('title')}}</span>
                </div>
            </div><br>
            <div class="form-group">
                <label class="control-label col-md-6" for="description" style="padding-left: 0px">La tua recensione</label>
                <div class="left-text col-md-6">
                    Consigli per scrivere una buona recensione
                </div>
                <textarea class="form-control" id="description" name="description" placeholder="Racconta agli utenti la tua esperienza sul gestionale aziendale e sui servizi di assistenza">{{$review->description}}</textarea>
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
                                <input name='easy_use_score' value="1" type='radio' @if($review->easy_use_score == '1') checked @endif >&nbsp;
                                <input name='easy_use_score' value="2" type='radio' @if($review->easy_use_score == '2') checked @endif >&nbsp;
                                <input name='easy_use_score' value="3" type='radio' @if($review->easy_use_score == '3') checked @endif >&nbsp;
                                <input name='easy_use_score' value="4" type='radio' @if($review->easy_use_score == '4') checked @endif >&nbsp;
                                <input name='easy_use_score' value="5" type='radio' @if($review->easy_use_score == '5') checked @endif >&nbsp;
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
                                <input name='implementation_score' type='radio' value="1" @if($review->implementation_score == '1') checked @endif>&nbsp;
                                <input name='implementation_score' type='radio' value="2" @if($review->implementation_score == '2') checked @endif>&nbsp;
                                <input name='implementation_score' type='radio' value="3" @if($review->implementation_score == '3') checked @endif>&nbsp;
                                <input name='implementation_score' type='radio' value="4" @if($review->implementation_score == '4') checked @endif>&nbsp;
                                <input name='implementation_score' type='radio' value="5" @if($review->implementation_score == '5') checked @endif>&nbsp;
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
                                <input name='technical_score' type='radio' value="1" @if($review->technical_score == '1') checked @endif>&nbsp;
                                <input name='technical_score' type='radio' value="2" @if($review->technical_score == '2') checked @endif>&nbsp;
                                <input name='technical_score' type='radio' value="3" @if($review->technical_score == '3') checked @endif>&nbsp;
                                <input name='technical_score' type='radio' value="4" @if($review->technical_score == '4') checked @endif>&nbsp;
                                <input name='technical_score' type='radio' value="5" @if($review->technical_score == '5') checked @endif>&nbsp;
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
                                <input name='update_score' type='radio' value="1" @if($review->update_score == '1') checked @endif >&nbsp;
                                <input name='update_score' type='radio' value="2" @if($review->update_score == '2') checked @endif >&nbsp;
                                <input name='update_score' type='radio' value="3" @if($review->update_score == '3') checked @endif >&nbsp;
                                <input name='update_score' type='radio' value="4" @if($review->update_score == '4') checked @endif >&nbsp;
                                <input name='update_score' type='radio' value="5" @if($review->update_score == '5') checked @endif >&nbsp;
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
                <div class="col-md-3">
                    <input class="btn3 btn-info" type="submit" value="Aggiorna recensione">
                </div>
                <div class="col-md-6"></div>
            </div>
        </div><br>
    </form>

@endsection
