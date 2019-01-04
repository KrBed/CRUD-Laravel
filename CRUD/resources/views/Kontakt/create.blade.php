@extends('Layouts.default')
@section('title',"Nowy kontakt")
@section('content')
<div class="container" >
          <div class="card mt-5">
  <div class="card-header text-center font-weight-bold text-white" style="background-color:#005aab">
  <h3>Nowy kontakt</h3>
  </div>
  <div class="card-body font-weight-bold">
    <form method="POST" action="/kontakt/nowy">
    <div class="row">
        <div class="form-group col-md-6">
            <label class="" for="imie">Imię: </label>
            <div class="">
                <input type="text" name='imie' class="form-control" value={{ old('imie') }}>
                @if ($errors->has('imie'))
                <small class="text-danger">{{ $errors->first('imie') }}</small>
            @endif
            </div>         
              </div>
              <div class="form-group col-md-6">
                <label class="" for="nazwisko">Nazwisko: </label>
                <div class="">
                    <input type="text" name='nazwisko' class="form-control" value={{ old('nazwisko') }} >
                    @if ($errors->has('nazwisko'))
                    <small class="text-danger">{{ $errors->first('nazwisko') }}</small>
                @endif
               </div>
              </div>
     </div>
              <div class="row">
              <div class="form-group col-md-6 ">
                <label class="" for="firma">Firma: </label>
                <div class="">
                    <input type="text" name='firma' class="form-control" value={{ old('firma') }} >
                    @if ($errors->has('firma'))
                    <small class="text-danger">{{ $errors->first('firma') }}</small>
                @endif
                </div>
              </div>
              <div class="form-group col-md-6">
                <label class="" for="oddzial">Oddział: </label>
                <div class="">
                    <input type="text" name='oddzial' class="form-control" value={{ old('oddzial')}} >
                    @if ($errors->has('oddzial'))
                    <small class="text-danger">{{ $errors->first('oddzial') }}</small>
                @endif
                </div>
              </div>
              </div>
              <div class="row">
              <div class="form-group col-md-6">
                <label class="" for="dzial">Dział: </label>
                <div class="">
                    <input type="text" name='dzial' class="form-control" value={{ old('dzial') }}>
                    @if ($errors->has('dzial'))
                    <small class="text-danger">{{ $errors->first('dzial') }}</small>
                @endif
                </div>
              </div>
              <div class="form-group col-md-6">
                <label class="" for="stanowisko">Stanowisko: </label>
                <div class="">
                    <input type="text" name='stanowisko' class="form-control" value={{ old('stanowisko') }}>
                    @if ($errors->has('stanowisko'))
                    <small class="text-danger">{{ $errors->first('stanowisko') }}</small>
                @endif
                </div>
              </div>
              </div>
              <div class="row">
              <div class="form-group col-md-6">
                <label class="" for="telefonStacjonarny">Telefon stacjonarny: </label>
                <div class="">
                    <input type="text" name='telefonStacjonarny' class="form-control" value={{ old('telefonStacjonarny')}} >
                    @if ($errors->has('telefonStacjonarny'))
                    <small class="text-danger">{{ $errors->first('telefonStacjonarny') }}</small>
                @endif
                </div>
              </div>            
              <div class="form-group col-md-6">
                <label class="" for="telefonKomorkowy">Telefon komórkowy: </label>
                <div class="">
                    <input type="text" name='telefonKomorkowy' class="form-control" value={{ old('telefonKomorkowy')}}>
                    @if ($errors->has('telefonKomorkowy'))
                    <small class="text-danger">{{ $errors->first('telefonKomorkowy') }}</small>
                @endif
                </div>
              </div>
              </div>
              <div class="row">
              <div class="form-group col-md-6">
                <label class="" for="email">Email: </label>
                <div class="">
                    <input type="text" name='email' class="form-control" value={{ old('email')}}>
                    @if ($errors->has('email'))
                    <small class="text-danger">{{ $errors->first('email') }}</small>
                @endif
                </div>
                </div>
              </div>
              @csrf
  </div>
  <div class="card-footer">
        <div class="row">
          @if(session()->get('error'))
      <div class="col-md-9 alert alert-danger text-center">
        {{ session()->get('error') }}  
      </div>
      @else
      <div class="col-md-9"></div>
    @endif
    <div class="col-md-3 text-right">
    <button type="submit" class="btn btn-primary " style="background-color:#005aab">Zapisz</button>
    </div>
  </div>
    </div>
  </div>
  </form>
  <a class="row m-1" href="{{action('KontaktController@index')}}">Powrót</a>
  </div>
 
</div>

@stop
