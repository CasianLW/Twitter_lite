<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tweets') }}
        </h2>
    </x-slot>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('tweets.store') }}">
            @csrf
            <textarea
                name="message"
                placeholder="{{ __('Nouveau tweet en tête ?') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('message') }}</textarea>
            <x-input-error :messages="$errors->get('message')" class="mt-2" />
            <x-primary-button class="mt-4">{{ __('Tweet') }}</x-primary-button>
        </form>
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
</x-app-layout>
