<nav x-data="{ open: false }" class="nav w-full z-50 bg-primary">
    <div class="mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex w-full">
                <div class="flex-shrink-0 flex items-center">
                    <a href="/"><img class="logo w-16" src="{{ asset('images/logo.png') }}" alt="AmitKK Logo" width="120" height="45"/></a>
                </div>
                <div class="hidden space-x-2 md:space-x-8 sm:-my-px sm:flex sm:ml-10 w-full justify-end">
                    <x-jet-nav-link href="{{ route('courses') }}" class="text-white hover:text-white hover:border-action focus:text-white">{{ __('Courses') }}</x-jet-nav-link>
                    <x-jet-nav-link href="{{ route('shop') }}" class="text-white hover:text-white hover:border-action focus:text-white">{{ __('Shop') }}</x-jet-nav-link>
                    <x-jet-nav-link href="{{ route('blogs') }}" class="text-white hover:text-white hover:border-action focus:text-white">{{ __('Blog') }}</x-jet-nav-link>
                    <x-jet-nav-link href="{{ route('cart') }}"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="#fff"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" /></svg></x-jet-nav-link>
                    @if(!Auth::user())
                        <div class="dd">
                            <x-jet-dropdown align="right" width="48" height="100%">
                                <x-slot name="trigger">
                                    <span class="text-white h-full hover:cursor-pointer inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 hover:border-action focus:outline-none focus:border-action transition">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg><svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" /></svg></span>
                                </x-slot>
                                <x-slot name="content">
                                    <x-jet-dropdown-link href="/register">Register</x-jet-dropdown-link>
                                    <x-jet-dropdown-link href="/login">Login</x-jet-dropdown-link>
                                </x-slot>
                            </x-jet-dropdown>
                        </div>
                    @endif
                </div>
            </div>
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <div class="ml-3 relative">
                    <x-jet-dropdown align="right" width="48" height="100%">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                    <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </button>
                            @else
                                @if(Auth::user())
                                    <span class="inline-flex rounded-md">
                                        <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                            {{ Auth::user()->name }}

                                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </span>
                                @endif
                            @endif
                        </x-slot>
                        <x-slot name="content">
                            @if(Auth::user())
                                <div class="block px-4 py-2 text-xs text-gray-400">{{ __('Manage Account') }}</div>
                                <x-jet-dropdown-link href="/admin/meta">{{ __('Admin Panel') }}</x-jet-dropdown-link>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-jet-dropdown-link href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">{{ __('Log Out') }}</x-jet-dropdown-link>
                                </form>
                            @endif
                        </x-slot>
                    </x-jet-dropdown>
                </div>
            </div>
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pb-2 space-y-1">
            <x-jet-responsive-nav-link href="{{ route('courses') }}" class="text-white hover:cursor-pointer">{{ __('Courses') }}</x-jet-responsive-nav-link>
            <x-jet-responsive-nav-link href="{{ route('shop') }}" class="text-white hover:cursor-pointer">{{ __('Shop') }}</x-jet-responsive-nav-link>
            <x-jet-responsive-nav-link href="{{ route('blogs') }}" class="text-white hover:cursor-pointer">{{ __('Blog') }}</x-jet-responsive-nav-link>
            @if(!Auth::user())
                        <div class="dd">
                            <x-jet-dropdown align="right" width="48" height="100%">
                                <x-slot name="trigger">
                                    <span class="text-white h-full hover:cursor-pointer inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 hover:border-action focus:outline-none focus:border-action transition">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg><svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" /></svg></span>
                                </x-slot>
                                <x-slot name="content">
                                    <x-jet-dropdown-link href="/register">Register</x-jet-dropdown-link>
                                    <x-jet-dropdown-link href="/login">Login</x-jet-dropdown-link>
                                </x-slot>
                            </x-jet-dropdown>
                        </div>
                    @endif
        </div>
        <div class="pb-2 border-t border-gray-200">
            <div class="space-y-1">
                @if(Auth::user())
                    <form method="POST" action="{{ route('logout') }}">@csrf <x-jet-responsive-nav-link href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">{{ __('Log Out') }}</x-jet-responsive-nav-link></form>
                @endif
            </div>
        </div>
    </div>
</nav>