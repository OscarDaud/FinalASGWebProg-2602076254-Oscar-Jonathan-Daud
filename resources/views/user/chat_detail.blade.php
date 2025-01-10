<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('user/chat_detail.title') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <style>
        body {
            margin: 0;
            display: flex;
            flex-direction: column;
            height: 100vh; 
        }
        .chat-header {
            box-shadow: 0 0 5px grey;
            background-color: white;
        }
        .chat-messages {
            flex: 1; 
            overflow-y: auto;
            padding: 1rem; 
        }
        .chat-input {
            box-shadow: 0 0 5px grey;
        }
    </style>
</head>
<body>
    
    <div class="p-2 d-flex gap-4 chat-header position-fixed top-0 start-0 end-0">
        <a href="{{ route('user.chat') }}">
            <img src="/assets/back.svg" style="width: 2rem; height: 2rem;" alt="Back" />
        </a>
        <div class="fw-bold" style="font-size: 1.25rem">
            @if ($chat_room->user1_id == $loggedin_user_id)
                {{ $chat_room->user2->name }}
            @else
                {{ $chat_room->user1->name }}
            @endif
        </div>
    </div>
    
    <div style="height: 64px"></div> 
    
    <div class="chat-messages d-flex flex-column gap-3 p-3">
        @foreach ($chats as $chat)
            <div class="d-flex {{ $chat->user_id == $loggedin_user_id ? 'justify-content-end' : 'justify-content-start' }}">
                <div class="px-2 py-1 rounded" style="max-width: 70%; background-color: silver;">
                    {{ $chat->content }}
                </div>
            </div>
        @endforeach
    </div>

    <form
        class="input-group px-3 py-2 chat-input position-fixed bottom-0 start-0 end-0 bg-light"
        method="POST"
        action="{{ route('api.chat.create') }}"
    >
        @csrf
        <input type="hidden" name="chat_room_id" value="{{ $chat_room->id }}" />
        <input type="hidden" name="user_id" value="{{ $loggedin_user_id }}" />
        <input type="text" class="form-control" name="content" placeholder="{{ __('user/chat_detail.type_message') }}" required>
        <button class="btn btn-primary" id="submitButton">{{ __('user/chat_detail.send') }}</button>
    </form>

</body>
</html>