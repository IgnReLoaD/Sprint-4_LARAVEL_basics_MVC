<!-- la plantillabase inclou bootstrapp i head i body  -->
@extends('layouts.plantillabase');

<!-- dins la plantillabase: document.getElementById('contenido') -->
@section('contenido')
    <h1>Vista Index de CLUB</h1>
    <a href="clubs/create" class="btn btn-primary">Nou club</a>
    <table class="table table-dark table-striped mt-4">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nom</th>
                <th scope="col">Palmares</th>
                <th scope="col">Fundat</th>
                <th scope="col">Opcions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($recordsetClubs as $club)
            <tr>
                <td>{{ $club->id_club }}</td>
                <td>{{ $club->name }}</td>
                <td>{{ $club->palmares }}</td>
                <td>{{ $club->foundation_year_month }}</td>
                <td>
                    <a href="/clubs/{{$club->id_club}}/edit" class="btn btn-info">editar</a>
                    <button class="btn btn-danger">borrar</button>
                </td>                
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection