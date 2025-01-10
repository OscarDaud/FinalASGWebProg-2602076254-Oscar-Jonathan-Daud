@extends('layout.user_master')

@section('content')

    <form id="form" class="card d-flex flex-row gap-3 p-3 rounded mb-5">
        <div class="w-50">
            <select class="form-select" name="field" onchange="document.getElementById('form').submit()">
                <option value="">{{ __('user/home.interest_dropdown') }}</option>
                @foreach ($fields as $field)
                    <option value="{{ $field->name }}" {{ request('field') == $field->name ? 'selected' : '' }}>
                        {{ $field->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="w-50">
            <select class="form-select" name="gender" onchange="document.getElementById('form').submit()">
                <option value="">{{ __('user/home.gender_dropdown') }}</option>
                <option value="Male" {{ request('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                <option value="Female" {{ request('gender') == 'Female' ? 'selected' : '' }}>Female</option>
            </select>
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
                    <form method="POST" action="{{ route('api.wishlist.create') }}" class="d-inline">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $loggedin_user->id }}" />
                        <input type="hidden" name="wishlist_user_id" value="{{ $user->id }}" />
                        <button type="submit" class="btn btn-primary">{{ __('user/home.thumb_button') }}</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

    @if ($users->isEmpty())
        <div class="alert alert-warning mt-3" role="alert">
            {{ __('user/home.no_users_found') }}
        </div>
    @endif

@endsection