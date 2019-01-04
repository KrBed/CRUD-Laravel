@extends('Layouts.default')
@section('title',"Lista kontaktów")
@section('content')

<div class="container-fluid">
  @if(session()->get('success'))
  <div id="message" class="alert alert-success" style="position: fixed; top: 0; right: 0;">
    {{ session()->get('success') }}  
  </div><br />
  @endif
  <div class="card mt-5">
    <div class="card-header text-center font-weight-bold text-white" style="background-color:#005aab">
            <h3 class="d-inline-block">Kontakty</h3> <a class="btn btn-default bg-white float-right" href="{{action('KontaktController@create')}}">Dodaj nowy</a>
            </div> 
            <div class="table-responsive"> 
<table class="table table-bordered table-hover ">
<thead>
<tr>
<th scope="col">Lp.</th>
<th scope="col">Imię</th>
<th scope="col">Nazwisko</th>
<th scope="col">Firma</th>
<th scope="col">Oddział</th>
<th scope="col">Dział</th>
<th scope="col">Stanowisko</th>
<th scope="col">Telefon stacjonarny</th>
<th scope="col">telefon komórkowy</th>
<th scope="col">Email</th>
</tr>
</thead>
<tbody>
@foreach ($contacts as $contact)
<tr>
        <th >{{$loop->iteration}}</th>
        <td>{{$contact->imie}}</td>
        <td>{{$contact->nazwisko}}</td>
        <td>{{$contact->firma}}</td>
        <td>{{$contact->oddzial}}</td>
        <td>{{$contact->dzial}}</td>
        <td>{{$contact->stanowisko}}</td>
        <td>{{$contact->telefonStacjonarny}}</td>
        <td>{{$contact->telefonKomorkowy}}</td>
        <td>{{$contact->email}}</td> 
        <td>
          <a class="btn btn-sm bg-info p-1 rounded text-white" href="{{action('KontaktController@edit',$contact->id)}}"><small>Edytuj</small><a/>
          <button 
          type="button" data-id="{{$contact->id}}" data-imie="{{$contact->imie}}" data-url="{{action('KontaktController@destroy',$contact->id)}}"
          data-nazwisko="{{$contact->nazwisko}}"class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal">
          Usuń
        </button>
        </td>      
        </td>
      </tr>          
@endforeach
</tbody>
</table>
</div>
<div>
</div> 
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-danger text-white">        
        <h4 class="modal-title ">Czy napewno usunąć kontakt:</h4>
        <button type="button" class="close" 
          data-dismiss="modal" 
          aria-label="Close">
          <span aria-hidden="true">&times;</span></button>       
      </div>
      <div class="modal-body"><h4><b><span id="dane"></span></b> </h4>
      </div>
      <div class="modal-footer">
        <button type="button" 
           class="btn  btn-success" 
           data-dismiss="modal">Anuluj</button>
        <span class="pull-right">
          <form method="POST" id="postData" class="addForm" action="">
             
            @csrf
          <button type="submit" class="btn bg-danger text-white">Usuń<a/>
          </form>
        </span>
      </div>
    </div>
  </div>
</div>
</div>
<script>
  setTimeout(function() {
  $("#message").fadeOut().empty();}, 5000);


$(function() {
    $('#deleteModal').on("show.bs.modal", function (e) {
         var imie = $(e.relatedTarget).data('imie');
         var nazwisko = $(e.relatedTarget).data('nazwisko');
         var id = $(e.relatedTarget).data('id');
         var url = $(e.relatedTarget).data('url');
         var dane = imie + " " + nazwisko;
         $("#dane").html(dane);
         $("#contact").html(id);
         $("#postData").attr("action",url); 
         $('body').find('.addForm').append('<input name="_method" type="hidden" value="DELETE">');
         $('body').find('.addForm').append('<input type ="hidden" id="contact" name="id" value"' + id + '">');            
    });
});
  </script>
@stop

