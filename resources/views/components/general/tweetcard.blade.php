
<div class="p-6 flex space-x-2">
                    
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 -scale-x-100" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                    </svg>
                    <div class="flex-1">
                        <div class="flex justify-between items-center">
                            <div class="justify-between flex w-full">
                                <div class="grid">
                                    {{--<span class="text-gray-800">{{ $name }}</span>--}}
                                    <a href="{{ route('tweets.user', $tweet->user->id) }}" class="text-blue-600 hover:text-blue-800">
                                    {{ $name }}
                                </a><small class="ml-0 text-sm text-gray-600">{{ $createdat }}</small>
                                </div>
                                <div class="grid"><span class="ml-2 text-sm text-gray-600"> {{ $createddiff }}</span>
                                @if ($auth)
                                <x-dropdown >
                                    <x-slot name="trigger">
                                        <button class="ml-2 float-right">
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
                            @endif</div>
                            </div>
                           
                               
                        </div>
                        
                        <p class="mt-4 text-lg text-black">{{ $message }}</p>
                        @unless ($updated)
                                    <small class="relative bottom-0 text-sm text-gray-600">{{ __('Modifié ') }} {{ $updatedtime }}</small>
                                @endunless
                    </div>
                </div>