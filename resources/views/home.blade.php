@extends('layout.main')

@section('content')
    <div class="container">

        <h1 class="text-center pb-3">I Nostri Treni</h1>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Azienda</th>
                    <th scope="col">Cidice Treno</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Stazione di Partenza</th>
                    <th scope="col">Stazione di Arrivo</th>
                    <th scope="col">Orario di Partenza</th>
                    <th scope="col">Orario di Arrivo</th>
                    <th scope="col">Numero Carrozze</th>
                    <th scope="col">Puntualità</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($trains as $train)
                    <tr>
                        <td>{{ $train->id }}</td>
                        <td>{{ $train->company }}</td>
                        <td>{{ $train->train_code }}</td>
                        <td>{{ $train->slug }}</td>
                        <td>{{ $train->departure_station }}</td>
                        <td>{{ $train->arrival_station }}</td>
                        <td>{{ $train->departure_time }}</td>
                        <td>{{ $train->arrival_time }}</td>
                        <td>{{ $train->carriages_number }}</td>
                        <td>{{ $train->in_time == 1 ? 'In orario' : 'In ritardo' }}</td>
                        <td>{{ $train->deleted == 1 ? 'Cancellato' : 'Tratta Attiva' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
