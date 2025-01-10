@extends('layout.user_master')

@section('content')

    @foreach ($chat_rooms as $chat_room)
        
        <?php
            
            $user = ($chat_room->user1_id == $loggedin_user_id) ? $chat_room->user2 : $chat_room->user1;

         
            $last_chat = collect($chat_room->chats)->last();
            $last_message = $last_chat ? $last_chat->content : "";

          
            $notification_count = $chat_room->chats->filter(function ($chat) use($loggedin_user_id) {
                return !$chat->is_read && $chat->user_id != $loggedin_user_id;
            })->count();
        ?>

        <a href="{{ route('user.chat_detail', ['chat_room_id' => $chat_room->id]) }}" class="card mb-3 text-decoration-none">
            <div class="row g-0 position-relative">
                <div class="col-md-1">
                    <img src="{{ $user->image }}" class="img-fluid rounded-start" alt="{{ $user->name }}">
                </div>
                <div class="col-md-11">
                    <div class="card-body">
                        <h5 class="card-title">{{ $user->name }}</h5>
                        <p class="card-text">{{ $last_message ?: __('No messages yet') }}</p>
                        @if ($notification_count > 0)
                            <div class="bg-success text-light rounded-circle d-flex justify-content-center align-items-center" style="width: 2rem; height: 2rem; position: absolute; top: 50%; right: 1rem; transform: translateY(-50%);">
                                {{ $notification_count }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </a>
    @endforeach

@endsection