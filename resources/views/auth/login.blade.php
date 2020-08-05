@extends('layouts.app')

@section('content')
    <div class="ui container">
        <form class="ui form" action="{{ route('login') }}" method="POST">
            @csrf
            <div class="field @error('password') error @enderror">
                <label for="email">{{ __('E-Mail Address') }}</label>
                <input id="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                <div class="ui pointing red basic label">
                    <strong>{{ $message }}</strong>
                </div>
                @enderror
            </div>
            <div class="field @error('password') error @enderror">
                <label for="password" class="">{{ __('Password') }}</label>
                <input id="password" type="password" name="password" required autocomplete="current-password">
                @error('password')
                    <div class="ui pointing red basic label">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="field">
                <button type="submit" class="ui button">
                    {{ __('Login') }}
                </button>
            </div>
        </form>
    </div>
@endsection
