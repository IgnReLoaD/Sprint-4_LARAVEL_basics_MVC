@extends('layouts.plantillabase');

@section('contenido')

<h2>Crear nou Jugador per aquest equip de aquest Club:</h2>

<form action="/clubs/{{$team->club_id}}/teams/{{$team->id}}/players" method="post">
    <!-- confiar en la pagina, i que no surti error 419-page expired  -->
    @csrf 
    <div class="mb-3">
        <label for="inpCod" class="form-label">Codi</label>
        <input type="text" id="inpCod" name="inpCod" class="form-control" disabled>
    </div>
    <div class="mb-3">
        <label for="inpTea" class="form-label">Equip</label>
        <!-- ojo! si ponemos DISABLED no incorpora el valor inpTea dentro del $_POST[]  -->
        <input type="text" id="inpTea" name="inpTea" class="form-control" tabindex="0"
        value="{{$team->id}}">
    </div>    
    <div class="mb-3">
        <label for="inpNom" class="form-label">Nom jugador</label>
        <input type="text" id="inpNom" name="inpNom" class="form-control" tabindex="1">
    </div>
    <div class="mb-3">
        <label for="inpDor" class="form-label">Dorsal</label>
        <input type="number" id="inpDor" name="inpDor" class="form-control" tabindex="2">
    </div>    
    <a href="/clubs/{{$team->club_id}}/teams/{{$team->id}}/players" class="btn btn-secondary" tabindex="3">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="4">Grabar</button>
</form>
@endsection
