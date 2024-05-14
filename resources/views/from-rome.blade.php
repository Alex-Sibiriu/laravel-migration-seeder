@extends('layout.main')

@section('content')
    <div class="container">

        <h1 class="text-center pb-3">I Nostri Treni</h1>

        <table class="table table-striped mb-3">
            <thead>
                <tr>
                    <th class="text-center align-content-center" scope="col">ID</th>
                    <th class="text-center align-content-center" scope="col">Azienda</th>
                    <th class="text-center align-content-center" scope="col">Cidice Treno</th>
                    <th class="text-center align-content-center" scope="col">Slug</th>
                    <th class="text-center align-content-center" scope="col">Stazione di Partenza</th>
                    <th class="text-center align-content-center" scope="col">Stazione di Arrivo</th>
                    <th class="text-center align-content-center" scope="col">Orario di Partenza</th>
                    <th class="text-center align-content-center" scope="col">Orario di Arrivo</th>
                    <th class="text-center align-content-center" scope="col">Numero Carrozze</th>
                    <th class="text-center align-content-center" scope="col">Puntualità</th>
                    <th class="text-center align-content-center" scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($trains as $train)
                    <tr>
                        <td class="text-center align-content-center">{{ $train->id }}</td>
                        <td class="text-center align-content-center">{{ $train->company }}</td>
                        <td class="text-center align-content-center">{{ $train->train_code }}</td>
                        <td class="text-center align-content-center">{{ $train->slug }}</td>
                        <td class="text-center align-content-center">{{ $train->departure_station }}</td>
                        <td class="text-center align-content-center">{{ $train->arrival_station }}</td>
                        <td class="text-center align-content-center">{{ $train->departure_time }}</td>
                        <td class="text-center align-content-center">{{ $train->arrival_time }}</td>
                        <td class="text-center align-content-center">{{ $train->wagons_number }}</td>
                        <td class="text-center align-content-center">
                            {{ $train->on_time == 1 ? 'In orario' : 'In ritardo' }}</td>
                        <td class="text-center align-content-center">
                            {{ $train->cancelled == 1 ? 'Cancellato' : 'Tratta Attiva' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
