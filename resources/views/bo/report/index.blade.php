@extends('layouts.app')

@section('content')
    <div class="ui container">
        <div class="ui segments">
            <div class="ui segment">
                <h1>Relatório</h1>
            </div>
            <div class="ui segment">
                <div class="ui tiny statistics">
                    <div class="statistic">
                        <div class="value">
                            {{$avg}}
                        </div>
                        <div class="label">
                            Média Geral
                        </div>
                    </div>
                    <div class="statistic">
                        <div class="value">
                            {{$totalProjects}}
                        </div>
                        <div class="label">
                            Total de Projectos
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="ui two column grid">
            <div class="column">
                <table class="ui celled table">
                    <thead>
                        <tr>
                            <th>Cliente</th>
                            <th>Média</th>
                        </tr>
                    </thead>
                @foreach($avgByClient as $client)
                    <tr>
                        <td>{{$client->name}}</td>
                        <td>{{$client->average}}</td>
                    </tr>
                @endforeach
                </table>
            </div>
            <div class="column">
                <table class="ui celled table">
                    <thead>
                    <tr>
                        <th>Cliente</th>
                        <th>Total</th>
                    </tr>
                    </thead>
                @foreach($totalProjectsByClient as $project)
                    <tr>
                        <td>{{$project->client->name}}</td>
                        <td>{{$project->total}}</td>
                    </tr>
                @endforeach
                </table>
            </div>
            <div class="column">
                <table class="ui celled table">
                    <thead>
                    <tr>
                        <th>Colaborador</th>
                        <th>Pergunta</th>
                        <th>Resposta</th>
                    </tr>
                    </thead>
                    @foreach($inputs as $input)
                        <tr>
                            <td>{{$input->employee->name}}</td>
                            <td>{{$input->question->text}}</td>
                            <td>{{$input->answer}}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

@endsection
