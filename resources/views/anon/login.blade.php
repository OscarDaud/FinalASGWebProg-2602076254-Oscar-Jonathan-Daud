@extends('layout.guest_master')

@section('content')

    <div class="h-100 d-flex justify-content-center align-items-center">
        <div class="card" style="width: 20rem;">
            <div class="card-header text-center">
                {{ __('guest/login.title') }}
            </div>
            <form method="POST" action="{{ route('api.login') }}" class="card-body">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">{{ __('guest/login.name') }}</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}" required>
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">{{ __('guest/login.password') }}</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" required>
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3 text-center">
                    <button type="submit" class="btn btn-primary">{{ __('guest/login.button') }}</button>
                </div>
                <div class="mb-3 text-center">
                    <p>{{ __('guest/login.text') }} <a href="{{ route('guest.register') }}">{{ __('guest/login.link') }}</a></p>
                </div>
            </form>
        </div>
    </div>

@endsection