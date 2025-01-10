@extends('layout.guest_master')

@section('content')

    <div class="h-100 d-flex justify-content-center align-items-center">
        <div class="card" style="width: 20rem;">
            <div class="card-header text-center">
                {{ __('guest/register.title') }}
            </div>
            <form method="POST" action="{{ route('api.register') }}" class="card-body">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">{{ __('guest/register.name') }}</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">{{ __('guest/register.password') }}</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <div class="mb-3">
                    <label for="gender" class="form-label">{{ __('guest/register.gender') }}</label>
                    <select class="form-select" name="gender">
                        <option hidden></option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="instagram" class="form-label">{{ __('guest/register.instagram') }}</label>
                    <input type="text" class="form-control" name="instagram" value="https://www.instagram.com/">
                </div>
                <div class="mb-3">
                    <label for="interest" class="form-label">{{ __('guest/register.interest') }}</label>
                    <select class="form-select" name="interest" aria-label="Default select example">
                        <option hidden></option>
                        @foreach ($fields as $field)
                            <option value="{{ $field->name }}">{{ $field->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="mobile_number" class="form-label">{{ __('guest/register.mobile_number') }}</label>
                    <input type="text" class="form-control" name="mobile_number">
                </div>
                <div class="mb-3 text-center">
                    <button type="submit" class="btn btn-primary">{{ __('guest/register.button') }}</button>
                </div>
                <div class="mb-3 text-center">
                    <p>{{ __('guest/register.text') }} <a href="{{ route('guest.login') }}">{{ __('guest/register.link') }}</a></p>
                </div>
            </form>
        </div>
    </div>

@endsection