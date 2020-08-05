@extends('layouts.app')

@section('content')
    <div class="ui container">
        <h1>Bem-vindo ao questionário da {{ $project->name }}</h1>
        <div class="ui two column centered grid">
            <div class="column">
                <form method="POST" action="{{route('survey.store', ['uuid' => $uuid])}}" class="ui form">
                    @csrf
                    <div class="field @error('name') error @enderror">
                        <label for="nome">
                            Nome
                        </label>
                        <input required id="name" name="name" type="text" placeholder="Nome">
                        @error('name')
                        <div class="ui pointing red basic label">
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                    </div>
                    <div class="field @error('role') error @enderror">
                        <label for="role">
                            Função
                        </label>
                        <input required id="role" name="role" type="text" placeholder="Função">
                        @error('role')
                        <div class="ui pointing red basic label">
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                    </div>

                    @foreach($questions as $question)
                        @if ($question->type === 'range')
                            <div class="grouped fields">
                                <label>
                                    {{Str::of($question->text)->replace(['{min}', '{max}'], [$question->min,                          $question->max])}}
                                </label>
                                @for ($i = $question->min; $i <= $question->max; $i++)
                                    <div class="field">
                                        <div class="ui radio checkbox">
                                            <input required type="radio" value="{{$i}}" name="question[{{$question->id}}]">
                                            <label>{{$i}}</label>
                                        </div>
                                    </div>
                                @endfor
                            </div>
                        @else
                            <div class="field">
                                <label for="">{{$question->text}}</label>
                                <input required type="text" name="question[{{$question->id}}]">
                            </div>
                        @endif

                    @endforeach
                    <div class="field">
                        <button class="ui button" type="submit">Gravar</button>
                    </div>
                </form>
            </div>
        </div>

    </div>



@endsection
