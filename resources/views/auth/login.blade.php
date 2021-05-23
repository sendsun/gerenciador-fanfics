@extends('layouts.app')
<link href="{{ asset('css/login.css') }}" rel="stylesheet">
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <form class="login" method="POST" action="{{ route('login') }}">
                @csrf
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="e-mail">
                @error('email')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="senha">
                @error('password')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror

                <button type="submit">
                    {{ __('login') }}
                </button>
            </form>
        </div>
    </div>
@endsection
