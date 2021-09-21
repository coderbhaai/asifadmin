<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        @livewireStyles
    </head>
    <body class="font-sans antialiased relative">
        <x-jet-banner />
        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif
            <main>{{ $slot }}</main>
            @livewire('parts.footer')
        </div>
        @stack('modals')
        @if( Request::route()->getName()!= 'addblog' && Request::route()->getName()!= 'updateblog' && Request::route()->getName()!= 'addproduct' && Request::route()->getName()!= 'updateproduct')
            <script src="/js/jquery-3.1.0.js"></script>
        @endif
        <script src="{{ mix('js/app.js') }}" defer></script>
        <!-- @if(Request::path() === '/')
            <script src="/js/home.js"></script>
        @endif -->
        @if(session()->has('message'))
            <style>
                .sweetalert{ bottom: 1em; }
            </style>
            <div class="sweetalert z-50 flex items-center justify-end gap-4 bg-red-100 p-4 rounded-md fixed right-0 rounded-xl shadow">
                <div class="space-y-1 text-sm">
                    <h6 class="font-medium text-red-900">Message</h6>
                    <p class="leading-tight">{{ session('message') }}</p>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
            <script>$(document).ready(function(){ $(".sweetalert").delay(2000).slideUp(300); }); </script>
        @endif
        @livewireScripts
    </body>
</html>
