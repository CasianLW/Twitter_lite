<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h2>Tweets by {{ $tweets->first()->user->name }}</h2>
               
                <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
            @foreach ($tweets as $tweet)

                @component('components.general.tweetcard', [
        'name' => $tweet->user->name,
        'createdat' => $tweet->created_at->format('j M Y, g:i a'),
        'createddiff' => $tweet->created_at->diffForHumans(),
        'auth' => $tweet->user->is(auth()->user()),
        'tweet' => $tweet,
        'message' => $tweet->message,
        'updated' => !$tweet->created_at->eq($tweet->updated_at),
        'updatedtime' => $tweet->updated_at->diffForHumans(),
    ])
        // Any additional content here
    @endcomponent
            @endforeach
        </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
