@extends('layouts.plantillabase');

@section('contenido')

<h2>Editar club</h2>

<form action="/clubs/{{$club->id}}" method="post">
    
    <!-- confiar en la pagina, i que no surti error 419-page expired  -->
    @csrf 

    <!-- etiqueta Form només té method Post/Get, aquesta directiva de Blade permet dir PUT -->
    @method('PUT')

    <div class="mb-3">
        <label for="inpCod" class="form-label">Codi</label>
        <input type="text" id="inpCod" name="inpCod" class="form-control" tabindex="1"
        value="{{$club->id_club}}">
    </div>
    <div class="mb-3">
        <label for="inpNom" class="form-label">Nom</label>
        <input type="text" id="inpNom" name="inpNom" class="form-control" tabindex="2"
        value="{{$club->name}}">
    </div>
    <div class="mb-3">
        <label for="inpFun" class="form-label">Fundat</label>
        <input type="text" id="inpFun" name="inpFun" class="form-control" tabindex="3"
        value="{{$club->fundation_year_month}}">
    </div>
    <div class="mb-3">
        <label for="inpPal" class="form-label">Palmares</label>
        <input type="text" id="inpPal" name="inpPal" class="form-control" tabindex="4"
        value="{{$club->palmares}}">
    </div>        
    <a href="/clubs" class="btn btn-secondary" tabindex="5">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="6">Grabar</button>
</form>

@endsection
