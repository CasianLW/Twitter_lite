<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h2>Tweets by {{ $tweets->first()->user->name }}</h2>
               
                <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
            @foreach ($tweets as $tweet)
            
                <div class="p-6 flex space-x-2">
                    
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 -scale-x-100" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                    </svg>
                    <div class="flex-1">
                        <div class="flex justify-between items-center">
                            <div class="justify-between flex w-full">
                                <div>
                                    {{--<span class="text-gray-800">{{ $tweet->user->name }}</span>--}}
                                    <a href="{{ route('tweets.user', $tweet->user->id) }}" class="text-blue-600 hover:text-blue-800">
                                    {{ $tweet->user->name }}
                                </a>
                                    <small class="ml-2 text-sm text-gray-600">{{ $tweet->created_at->format('j M Y, g:i a') }}</small>
                                </div>
                                <span class="ml-2 text-sm text-gray-600"> {{ $tweet->created_at->diffForHumans() }}</span>
                            </div>
                            @if ($tweet->user->is(auth()->user()))
                                <x-dropdown >
                                    <x-slot name="trigger">
                                        <button class="ml-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                            </svg>
                                        </button>
                                    </x-slot>
                                    <x-slot name="content">
                                        <x-dropdown-link :href="route('tweets.edit', $tweet)">
                                            {{ __('Edit') }}
                                        </x-dropdown-link>
                                        <form method="POST" action="{{ route('tweets.destroy', $tweet) }}">
                                            @csrf
                                            @method('delete')
                                            <x-dropdown-link :href="route('tweets.destroy', $tweet)" onclick="event.preventDefault(); this.closest('form').submit();">
                                                {{ __('Delete') }}
                                            </x-dropdown-link>
                                        </form>
                                    </x-slot>
                                </x-dropdown>
                            @endif
                               
                        </div>
                        
                        <p class="mt-4 text-lg text-gray-900">{{ $tweet->message }}</p>
                        @unless ($tweet->created_at->eq($tweet->updated_at))
                                    <small class="relative bottom-0 text-sm text-gray-600"> &middot; {{ __('Modifié ') }} {{ $tweet->updated_at->diffForHumans() }}</small>
                                @endunless
                    </div>
                </div>
                
            @endforeach
        </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>