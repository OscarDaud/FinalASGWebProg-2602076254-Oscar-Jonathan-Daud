@extends('layout.user_master')

@section('content')

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">{{ __('user/friend.no') }}</th>
                    <th scope="col">{{ __('user/friend.name') }}</th>
                    <th scope="col">{{ __('user/friend.action') }}</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($wishlists as $wishlist)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $wishlist->wishlist_user->name }}</td>
                        <td>
                            <form method="POST" action="{{ route('api.wishlist.delete', ['wishlist_id' => $wishlist->id]) }}" class="d-inline">
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="btn btn-danger" onclick="return confirm('{{ __('user/friend.confirm_delete') }}')">{{ __('user/friend.delete') }}</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">{{ __('user/friend.no_wishlists') }}</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

@endsection