@extends('layouts.plantillabase');

@section('css')
<link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endsection

<!-- club/edit.blade.php ... que ja inclou la plantillabase amb bootstrapp i head i body  -->
<!-- la sentencia ...extends('club.edit'); interpreta el simbol i queda descomentat -->
<!-- produint l'error $club no declarat a clubs.index.blade -->

<!-- dins la club/edit.blade.php: document.getElementById('teams_categories') -->

@section('contenido')

    <h2>Vista Index de Teams del Club {{$recordsetTeams[0]->club_id}}:</h2>
    <a href="teams/create" class="btn btn-success mb-6">Nou equip per aquest club</a>

    <table id="tblTeams" class="table table-success table-striped table-bordered shadow-lg mt-4" style="width:100%">
        <thead class="bg-success text-success">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">club_id</th>
                <th scope="col">Nom categoria</th>
                <th scope="col">Tipus esport</th>
                <th scope="col">Opcions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($recordsetTeams as $fieldsetTeam)
            <tr>
                <td>{{ $fieldsetTeam->id_team }}</td>
                <td>{{ $fieldsetTeam->club_id }}</td>
                <td>{{ $fieldsetTeam->name }}</td>
                <td>{{ $fieldsetTeam->type }}</td>
                <td>
                    <form action="{{ route ('team.destroy',$fieldsetTeam->id_team) }}" method="post">
                        <a href="/teams/{{$fieldsetTeam->id_team}}/edit" class="btn btn-success">editar</a>
                        @csrf 
                        @method('DELETE')
                        <button class="btn btn-danger">borrar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <hr>
    <a href="/clubs/{{$fieldsetTeam->club_id}}/edit" class="btn btn-success"><< Tornar a la Fitxa del Club</a>
    <a href="/clubs" class="btn btn-secondary"><< Tornar a la llista de Clubs</a>

    @section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function () {
            // html id de Table li hem dit 'clubs'
            $('#tblTeams').DataTable({
                "lengthMenu": [[5,10,15,-1],[5,10,15,'tots']]
            });
        });
    </script>
    @endsection

@endsection
