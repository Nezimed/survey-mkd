@extends('layouts.app')

@section('content')
    <div class="ui container">
        <table class="ui celled table">
            <thead>
            <tr>
                <th>Projecto</th>
                <th>URL</th>
                <th>Data Criação</th>
            </tr>
            </thead>
            @foreach($projects as $project)
                <tr>
                    <td>{{$project->name}}</td>
                    <td>{{url('/survey') . '/'. $project->uuid}}</td>
                    <td>{{$project->created_at}}</td>
                </tr>
            @endforeach
        </table>
        <div>
            <a class="ui button" href="{{route('projects.create')}}">Novo Projecto</a>
        </div>
    </div>
@endsection
