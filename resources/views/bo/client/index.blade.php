@extends('layouts.app')

@section('content')
    <div class="ui container">
        <table class="ui celled table">
            <thead>
            <tr>
                <th>Cliente</th>
                <th>Data Criação</th>
            </tr>
            </thead>
            @foreach($clients as $client)
                <tr>
                    <td>{{$client->name}}</td>
                    <td>{{$client->created_at}}</td>
                </tr>
            @endforeach
        </table>
        <div>
            <a class="ui button" href="{{route('clients.create')}}">Novo Cliente</a>
        </div>
    </div>
@endsection
