@extends('layout.guest_master')

@section('content')

    <form id="form" class="card d-flex flex-row gap-3 p-3 rounded mb-5">
        <div class="w-50">
            <select class="form-select" name="field" onchange="document.getElementById('form').submit()">
                <option value="">{{ __('guest/home.interest_dropdown') }}</option>
                @foreach ($fields as $field)
                    <option value="{{ $field->name }}" {{ request('field') == $field->name ? 'selected' : '' }}>
                        {{ $field->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="w-50">
            <select class="form-select" name="gender" onchange="document.getElementById('form').submit()">
                <option value="">{{ __('guest/home.gender_dropdown') }}</option>
                <option value="Male" {{ request('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                <option value="Female" {{ request('gender') == 'Female' ? 'selected' : '' }}>Female</option>
            </select>
        </div>
        <div class="w-100">
            <input type="text" name="search" class="form-control" placeholder="{{ __('guest/home.search_placeholder') }}" value="{{ request('search') }}">
        </div>
        <div class="w-100">
            <button type="submit" class="btn btn-primary">{{ __('guest/home.filter_button') }}</button>
            <a href="{{ request()->url() }}" class="btn btn-secondary">{{ __('guest/home.reset_button') }}</a>
        </div>
    </form>

    <div class="d-flex flex-wrap gap-3">
        @foreach ($users as $user)
            <div class="card" style="width: calc((100% - 3rem) / 4);">
                <img src="{{ $user->image }}" class="card-img-top" alt="{{ $user->name }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $user->name }}</h5>
                    <p class="card-text">{{ $user->gender }}</p>
                    <p class="card-text">{{ $user->interest }}</p>
                    <a href="{{ route('guest.login') }}" class="btn btn-primary">{{ __('guest/home.thumb_button') }}</a>
                </div>
            </div>
        @endforeach
    </div>

@endsection