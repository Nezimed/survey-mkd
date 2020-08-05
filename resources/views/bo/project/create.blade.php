@extends('layouts.app')

@section('content')
    <div class="ui container mx-auto">
        <div class="ui two column centered grid">
            <div class="column">
                <form class="ui form" method="POST" action="{{ route('projects.store') }}">
                    @csrf
                    <div class="field @error('client') error @enderror">
                        <label for="client">
                            Cliente
                        </label>
                        <select name="client" id="client" required>
                            <option value="">:: Escolher ::</option>
                            @foreach ($clients as $client)
                                <option value="{{$client->id}}">{{ $client->name }}</option>
                            @endforeach
                        </select>
                        @error('client')
                        <div class="ui pointing red basic label">
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                    </div>
                    <div class="field @error('project_name') error @enderror">
                        <label for="project_name">
                            Nome do Projecto
                        </label>
                        <input required id="project_name" name="project_name" type="text" placeholder="Nome do projecto">
                        @error('project_name')
                        <div class="ui pointing red basic label">
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                    </div>
                    <div class="field">
                        <button class="ui button" type="submit">
                            Criar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
