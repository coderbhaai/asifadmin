<nav x-data="{ open: false }" class="nav w-full z-50 bg-primary">
    <div class="mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex w-full">
                <div class="flex-shrink-0 flex items-center">
                    <a href="/"><img class="logo w-16" src="{{ asset('images/logo.png') }}" alt="AmitKK Logo" width="120" height="45"/></a>
                </div>
                <div class="hidden space-x-2 md:space-x-8 sm:-my-px sm:flex sm:ml-10 w-full justify-end">
                    <div class="dd">
                        <x-jet-dropdown align="right" width="48" height="100%">
                            <x-slot name="trigger">
                                <span class="text-white h-full hover:cursor-pointer inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 hover:border-action focus:outline-none focus:border-action transition">Services<svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" /></svg></span>
                            </x-slot>
                            <x-slot name="content">
                                <x-jet-dropdown-link href="/digital-marketing-company-in-delhi">Digital Marketing</x-jet-dropdown-link>
                                <x-jet-dropdown-link href="/seo-company-in-delhi">SEO</x-jet-dropdown-link>
                                <x-jet-dropdown-link href="/social-media-marketing-agency">Social Media Marketing</x-jet-dropdown-link>
                                <x-jet-dropdown-link href="/graphic-design-company">Graphics</x-jet-dropdown-link>
                                <x-jet-dropdown-link href="/app-development-in-delhi">App Development</x-jet-dropdown-link>
                                <x-jet-dropdown-link href="/website-designing-company-in-delhi">Website Development</x-jet-dropdown-link>
                                <x-jet-dropdown-link href="/offline-marketing-services">Offline Marketing</x-jet-dropdown-link>
                                <x-jet-dropdown-link href="/content-writing-services">Content Writing</x-jet-dropdown-link>
                                <x-jet-dropdown-link href="/guest-post">Guest Blogging</x-jet-dropdown-link>
                                <x-jet-dropdown-link href="/lead-generation-companies">Lead Generation</x-jet-dropdown-link>
                                <x-jet-dropdown-link href="/ecommerce-website-development-in-delhi">E-Commerce</x-jet-dropdown-link>
                                @if(Auth::user())
                                    <div class="border-t border-gray-100"></div>
                                    <form method="POST" action="{{ route('logout') }}">@csrf <x-jet-dropdown-link href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">{{ __('Log Out') }}</x-jet-dropdown-link></form>
                                @endif
                            </x-slot>
                        </x-jet-dropdown>
                    </div>
                    <div class="dd">
                        <x-jet-dropdown align="right" width="48" height="100%">
                            <x-slot name="trigger">
                                <span class="text-white h-full hover:cursor-pointer inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 hover:border-action focus:outline-none focus:border-action transition">Technology<svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" /></svg></span>
                            </x-slot>
                            <x-slot name="content">
                                <x-jet-dropdown-link href="/wordpress-website-development">Wordpress Development</x-jet-dropdown-link>
                                <x-jet-dropdown-link href="/laravel-developer">Laravel Development</x-jet-dropdown-link>
                                <x-jet-dropdown-link href="/react-development-company">React JS Development</x-jet-dropdown-link>
                                <x-jet-dropdown-link href="/node-js-developer">NodeJS Development</x-jet-dropdown-link>
                                <x-jet-dropdown-link href="/vue-js-development-company">VueJS Development</x-jet-dropdown-link>
                                <x-jet-dropdown-link href="/quasar-developer">Quasar Development</x-jet-dropdown-link>
                            </x-slot>
                        </x-jet-dropdown>
                    </div>
                    <div class="dd">
                        <x-jet-dropdown align="right" width="48" height="100%">
                            <x-slot name="trigger">
                                <span class="text-white h-full hover:cursor-pointer inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 hover:border-action focus:outline-none focus:border-action transition">Portfolio<svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" /></svg></span>
                            </x-slot>
                            <x-slot name="content">
                                <x-jet-dropdown-link href="/web-portfolio">Web Portfolio</x-jet-dropdown-link>
                                <x-jet-dropdown-link href="/graphics-portfolio">Graphics Portfolio</x-jet-dropdown-link>
                                <x-jet-dropdown-link href="/video-portfolio">Video Portfolio</x-jet-dropdown-link>
                                <x-jet-dropdown-link href="/images/portfolio/AmitKK-Portfolio.pdf" target="_blank">Company Portfolio</x-jet-dropdown-link>
                                <x-jet-dropdown-link href="/images/portfolio/amit_kumar_khare_resume.pdf" target="_blank">My Resume</x-jet-dropdown-link>
                            </x-slot>
                        </x-jet-dropdown>
                    </div>
                    <x-jet-nav-link href="/blog" :active="request()->routeIs('blog')" class="text-white hover:text-white hover:border-action focus:text-white">{{ __('Blog') }}</x-jet-nav-link>
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
            <div class="mobiledd">
                <x-jet-dropdown align="right" width="48" height="100%">
                    <x-slot name="trigger">
                        <span class="inline-flex text-white hover:cursor-pointer pl-3 py-2 border-l-4 border-transparent items-center">Services<svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" /></svg></span>
                    </x-slot>
                    <x-slot name="content">
                        <x-jet-dropdown-link href="/digital-marketing-company-in-delhi">Digital Marketing</x-jet-dropdown-link>
                        <x-jet-dropdown-link href="/seo-company-in-delhi">SEO</x-jet-dropdown-link>
                        <x-jet-dropdown-link href="/social-media-marketing-agency">Social Media Marketing</x-jet-dropdown-link>
                        <x-jet-dropdown-link href="/graphic-design-company">Graphics</x-jet-dropdown-link>
                        <x-jet-dropdown-link href="/app-development-in-delhi">App Development</x-jet-dropdown-link>
                        <x-jet-dropdown-link href="/website-designing-company-in-delhi">Website Development</x-jet-dropdown-link>
                        <x-jet-dropdown-link href="/offline-marketing-services">Offline Marketing</x-jet-dropdown-link>
                        <x-jet-dropdown-link href="/content-writing-services">Content Writing</x-jet-dropdown-link>
                        <x-jet-dropdown-link href="/guest-post">Guest Blogging</x-jet-dropdown-link>
                        <x-jet-dropdown-link href="/lead-generation-companies">Lead Generation</x-jet-dropdown-link>
                        <x-jet-dropdown-link href="/ecommerce-website-development-in-delhi">E-Commerce</x-jet-dropdown-link>
                        @if(Auth::user())
                            <div class="border-t border-gray-100"></div>
                            <form method="POST" action="{{ route('logout') }}">@csrf <x-jet-dropdown-link href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">{{ __('Log Out') }}</x-jet-dropdown-link></form>
                        @endif
                    </x-slot>
                </x-jet-dropdown>
            </div>
            <div class="mobiledd">
                <x-jet-dropdown align="right" width="48" height="100%">
                    <x-slot name="trigger">
                        <span class="inline-flex text-white hover:cursor-pointer pl-3 py-2 border-l-4 border-transparent items-center">Technology<svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" /></svg></span>
                    </x-slot>
                    <x-slot name="content">
                        <x-jet-dropdown-link href="/wordpress-website-development">WordPress Development</x-jet-dropdown-link>
                        <x-jet-dropdown-link href="/laravel-developer">Laravel Development</x-jet-dropdown-link>
                        <x-jet-dropdown-link href="/react-development-company">React JS Development</x-jet-dropdown-link>
                        <x-jet-dropdown-link href="/node-js-developer">Node JS Development</x-jet-dropdown-link>
                        <x-jet-dropdown-link href="/vue-js-development-company">Vue JS Development</x-jet-dropdown-link>
                        <x-jet-dropdown-link href="/quasar-developer">Quasar Development</x-jet-dropdown-link>
                    </x-slot>
                </x-jet-dropdown>
            </div>
            <div class="mobiledd">
                <x-jet-dropdown align="right" width="48" height="100%">
                    <x-slot name="trigger">
                        <span class="inline-flex text-white hover:cursor-pointer pl-3 py-2 border-l-4 border-transparent items-center">Portfolio<svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" /></svg></span>
                    </x-slot>
                    <x-slot name="content">
                        <x-jet-dropdown-link href="/web-portfolio">Web Portfolio</x-jet-dropdown-link>
                        <x-jet-dropdown-link href="/graphics-portfolio">Graphics Portfolio</x-jet-dropdown-link>
                        <x-jet-dropdown-link href="/video-portfolio">Video Portfolio</x-jet-dropdown-link>
                        <x-jet-dropdown-link href="/images/portfolio/AmitKK-Portfolio.pdf" target="_blank">Company Portfolio</x-jet-dropdown-link>
                        <x-jet-dropdown-link href="/images/portfolio/amit_kumar_khare_resume.pdf" target="_blank">My Resume</x-jet-dropdown-link>
                    </x-slot>
                </x-jet-dropdown>
            </div>
            <x-jet-responsive-nav-link href="/blog" :active="request()->routeIs('blog')" class="text-white hover:cursor-pointer">{{ __('Blog') }}</x-jet-responsive-nav-link>
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