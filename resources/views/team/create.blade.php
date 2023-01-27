@extends('layouts.plantillabase');

@section('contenido')

<h2>Crear nou equip per aquest Club:</h2>

<form action="/clubs/{club}/teams/create" method="post">
    <!-- confiar en la pagina, i que no surti error 419-page expired  -->
    @csrf 
    <div class="mb-3">
        <label for="inpCod" class="form-label">Codi</label>
        <input type="text" id="inpCod" name="inpCod" class="form-control" disabled>
    </div>
    <div class="mb-3">
        <label for="inpClb" class="form-label">Club</label>
        <input type="text" id="inpCod" name="inpCod" class="form-control" disabled>
    </div>    
    <div class="mb-3">
        <label for="inpNom" class="form-label">Nom categoria</label>
        <input type="text" id="inpNom" name="inpNom" class="form-control" tabindex="1">
    </div>
    <div class="mb-3">
        <label for="inpTyp" class="form-label">Tipus esport</label>
        <input type="text" id="inpFun" name="inpFun" class="form-control" tabindex="2">
    </div>    
    <a href="/clubs/{club}/teams" class="btn btn-secondary" tabindex="3">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="4">Grabar</button>
</form>
@endsection