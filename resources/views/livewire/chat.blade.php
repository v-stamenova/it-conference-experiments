<div wire:poll.5s>>
    <div>
        @foreach ($messages as $message)
            <div>
                <strong>{{ $message->sender->name }}:</strong> {{ $message->content }}
            </div>
        @endforeach
    </div>

    <div>
        <form wire:submit.prevent="sendMessage">
            <input type="text" wire:model="newMessage">
            <button type="submit">Send</button>
        </form>
    </div>
</div>
