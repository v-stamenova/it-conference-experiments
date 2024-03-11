<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('messages.index', compact(['users']));
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('messages.show', compact(['user']));
    }
}
