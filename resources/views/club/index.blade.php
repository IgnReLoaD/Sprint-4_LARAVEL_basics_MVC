<!-- la plantillabase inclou bootstrapp i head i body  -->
@extends('layouts.plantillabase');

<!-- dins la plantillabase: document.getElementById('contenido') -->
@section('contenido')
    <h2>Vista Index de CLUB</h2>
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
            @foreach ($recordsetClubs as $fieldsetClub)
            <tr>
                <td>{{ $fieldsetClub->id }}</td>
                <td>{{ $fieldsetClub->name }}</td>
                <td>{{ $fieldsetClub->palmares }}</td>
                <td>{{ $fieldsetClub->foundation_year_month }}</td>
                <td>
                    <form action="{{ route ('clubs.destroy',$fieldsetClub->id) }}" method="post">
                        <a href="/clubs/{{$fieldsetClub->id}}/edit" class="btn btn-info">editar</a>
                        @csrf 
                        @method('DELETE')
                        <button class="btn btn-danger">borrar</button>
                    </form>
                </td>                
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection