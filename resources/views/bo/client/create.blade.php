@extends('layouts.app')

@section('content')
    <div class="ui container mx-auto">
        <div class="ui two column centered grid">
            <div class="column">
                <form class="ui form" method="POST" action="{{ route('clients.store') }}">
                    @csrf
                    <div class="field @error('client') error @enderror">
                        <label for="client">
                            Nome do cliente
                        </label>
                        <input required id="client" name="client" type="text" placeholder="Nome do cliente">
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
