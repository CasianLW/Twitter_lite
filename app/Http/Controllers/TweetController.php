<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Tweet;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class TweetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        //
        return view('tweets.index',['tweets'=> Tweet::with('user')->latest()->get(),]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
        public function store(Request $request): RedirectResponse
    {
        //
        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ]);
 
        $request->user()->tweets()->create($validated);
 
        return redirect(route('tweets.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Tweet $tweet)
    {
        //
    }

    public function userTweets(int $user_id): View
{
    $user = User::findOrFail($user_id);
    $tweets = $user->tweets()->latest()->get();

    return view('tweets.user', [
        'user' => $user,
        'tweets' => $tweets,
    ]);
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tweet $tweet)
    {
        $this->authorize('update', $tweet);
 
        return view('tweets.edit', [
            'tweet' => $tweet,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tweet $tweet): RedirectResponse
    {
        $this->authorize('update', $tweet);
 
        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ]);
 
        $tweet->update($validated);
 
        return redirect(route('tweets.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tweet $tweet)
    {
        $this->authorize('delete', $tweet);
 
        $tweet->delete();
 
        return redirect(route('tweets.index'));
    }
}
