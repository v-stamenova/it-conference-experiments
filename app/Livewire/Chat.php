<?php

namespace App\Livewire;

use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Chat extends Component
{
    public $messages = [];
    public $newMessage;
    public $user;

    public function mount()
    {
        $this->user = Auth::user();
    }
    public function sendMessage()
    {
        Message::create([
            'sender_id' => $this->user->id,
            'receiver_id' => $this->user->id,
            'content' => $this->newMessage,
        ]);

        $this->newMessage = '';
    }

    public function render()
    {
        $this->messages = Message::with('sender')->get();
        return view('livewire.chat');
    }
}
